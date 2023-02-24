<?php

namespace Beon\IntranetBundle\Command;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Beon\IntranetBundle\Entity\Repository\FacebookUrlRepository;
use Beon\IntranetBundle\Entity\Repository\FacebookLikecountRepository;

class FacebookCommand extends ContainerAwareCommand
{

    /** @var EntityManager */
    protected $em;

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output); //initialize parent class method
        $this->em = $this->getContainer()->get('doctrine')->getManager();
    }

    protected function configure()
    {
        $this->setName('beon:facebook')
            ->setDescription('facebook data pull')
            ->addArgument(
                'option'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var $facebookUrlRepository FacebookUrlRepository */
        $facebookUrlRepository = $this->em->getRepository('IntranetBundle:FacebookUrl');
        $facebookUrls = $facebookUrlRepository->findAll();
        $contactUser = $this->em->getRepository("IntranetBundle:User")->findOneByName('markus');
        $apiEndPoint = $this->getContainer()->getParameter('graph_api_endpoint');
        $fbAuth = $this->getFacebookAuth($apiEndPoint);

        if (!$fbAuth) {
            $this->SendReAuthEmail($contactUser);
        }

        $currentDate = new \DateTime();
        $currentDate->add(new \DateInterval('P7D'));

        if ($fbAuth && $fbAuth->getExpiresAt() < $currentDate){
             $this->SendReAuthEmail($contactUser);
        }

        /** @var $fbLkeCountRepo FacebookLikecountRepository */
        $fbLkeCountRepo = $this->em->getRepository('IntranetBundle:FacebookLikecount');

        $authToken = $this->getFallBackAuthToken();
        if ($input->getArgument('option') == 'like') {

            foreach ($facebookUrls as $fbUrl) {
                $this->facebookLikeCount($fbAuth, $fbUrl, $apiEndPoint, $fbLkeCountRepo, $contactUser);
            }
        }

        if ($input->getArgument('option') == 'lastpost') {

            foreach ($facebookUrls as $fbUrl) {

                $this->facbookLastPost($fbUrl, $fbAuth, $apiEndPoint, $authToken, $fbLkeCountRepo);
            }
        }

        if ($input->getArgument('option') == 'all') {

            foreach ($facebookUrls as $fbUrl) {
                $this->facebookLikeCount($fbAuth, $fbUrl, $apiEndPoint, $fbLkeCountRepo, $contactUser);
                $this->facbookLastPost($fbUrl, $fbAuth, $apiEndPoint, $authToken, $fbLkeCountRepo);
            }
        }

    }

    private static function getFacebookLikeCount($fb_url)
    {
        $query = "select like_count from link_stat WHERE url ='" . $fb_url . "'";
        $json_result = self::fetchUrl(
            "https://api.facebook.com/method/fql.query?query=" . urlencode($query) . "&format=json"
        );
        $php_result = json_decode($json_result);

        return $php_result[0]->like_count;
    }

    private function getFacebookLikeCountByAuthToken($page_url, $authToken, $EndPoint)
    {
        $result = $this->getFbPageResources($page_url, $authToken, $EndPoint);

        if (property_exists($result, 'likes')) {
            return $result->likes;
        } else {
            return false;
        }

    }

    public static function fetchUrl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $feedData = curl_exec($ch);
        curl_close($ch);

        return $feedData;

    }

    private static function extractPageNameFromUrl($url)
    {
        $urlParseArray = explode('https://www.facebook.com/', $url);

        return $urlParseArray[1];
    }


    private static function extractPageIdFromUrl($pageName)
    {

        $pageNameParser = explode('/', $pageName);
        if (in_array('pages', $pageNameParser)) {
            return end($pageNameParser);
        } else {
            return FALSE;
        }
    }

    private static function toBerlinTime($timeStr)
    {
        $date = new \DateTime($timeStr);
        $date->setTimeZone(new \DateTimeZone('Europe/Berlin'));

        return $date->format('Y-m-d H:i:s');
    }

    /**
     * @param $page_url
     * @param $authToken
     * @return mixed
     */
    private function getFbPageResources($page, $authToken, $apiEndPoint)
    {
        $result = @json_decode(self::fetchUrl($apiEndPoint . '/' . $page . '?access_token=' . $authToken));
        return $result;
    }

    /**
     * @return mixed
     */
    protected function getFacebookAuth($apiEndPoint)
    {
        $facebookAuthRepository = $this->em->getRepository('IntranetBundle:FacebookAuth');
        $facebookAuth = $facebookAuthRepository->createQueryBuilder('c')
            ->where('c.expiresAt > :currentDate')
            ->setParameter('currentDate', new \DateTime())
            ->getQuery()
            ->getOneOrNullResult();

        if($facebookAuth){
            $data = self::fetchUrl($apiEndPoint.'/me?access_token='.$facebookAuth->getAuthToken());
            $invalid =  @json_decode($data)->error;
            if($invalid){
                return FALSE;
            }
        }

        return $facebookAuth;
    }

    /**
     * @param $contactUser
     * @return \Swift_Mime_MimePart
     */
    protected function SendReAuthEmail($contactUser)
    {
        $host = $this->getContainer()->get('router')->getContext()->getHost();
        $scheme = $this->getContainer()->get('router')->getContext()->getScheme();
        $baseUrl = $scheme . '://' . $host;
        $mailBody = nl2br($this->getContainer()->get('templating')->render(
            'IntranetBundle:FacebookAuth:notification.html.twig',
            array('baseUrl' => $baseUrl)
        ));
        $message = $this->EmailSender($contactUser, $mailBody, 'Facebook Auth');

        return $message;
    }

    /**
     * @param $contactUser
     * @param $mailBody
     * @return \Swift_Mime_MimePart
     */
    protected function EmailSender($contactUser, $mailBody, $subject)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($this->getContainer()->getParameter('fromEmail'))
            ->setTo($contactUser->getEmail())
            ->setBody(
                $mailBody,
                'text/html',
                'utf-8'
            );

        return $this->getContainer()->get('mailer')->send($message);
    }

    /**
     * @param $facebookAuth
     * @param $facebookUrl
     * @param $apiEndPoint
     * @param $facebooklikecountRepository
     * @param $contactUser
     */
    protected function facebookLikeCount( $facebookAuth, $facebookUrl, $apiEndPoint, $facebooklikecountRepository, $contactUser)
    {
        $like_count = 0;

        if ($facebookAuth) {
            $like_count = $this->getFacebookLikeCountByAuthToken( $facebookUrl->getUrl(), $facebookAuth->getAuthToken(), $apiEndPoint );
        }
        if (!$like_count) {
            $like_count = self::getFacebookLikeCount($facebookUrl->getUrl());
        }
        if ($like_count) {
            $todaysRecord = $facebooklikecountRepository->findTodaysRecordForUrl($facebookUrl);

            if ($todaysRecord) {
                $facebooklikecountRepository->updateFacebookLike($todaysRecord->getId(), $like_count);
            } else {
                $facebooklikecountRepository->saveLikeCount($facebookUrl, $like_count, new \DateTime());
            }
            if ($facebookUrl->getWarningMailSent()) {
                $facebookUrl->setWarningMailSent(false);
            }
        } else {
            if (!$facebookUrl->getWarningMailSent() && $contactUser) {
                $mailBody = "Bitte überpfrüfen, warum die Likes von " . $facebookUrl->getUrl(
                    ) . " nicht abgerufen werden konnten.";
                $sendEmail = $this->EmailSender($contactUser, $mailBody, 'Facebook Authentication');
                if ($sendEmail) {
                    $facebookUrl->setWarningMailSent(true);
                }
            }
        }
        $this->em->persist($facebookUrl);
        $this->em->flush();
    }

    /**
     * @return mixed
     */
    protected function getFallBackAuthToken()
    {
        $app_id = $this->getContainer()->getParameter('fb_app_id');
        $app_secret = $this->getContainer()->getParameter('fb_app_secret');
        $authToken = self::fetchUrl(
            "https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id={$app_id}&client_secret={$app_secret}"
        );

        return $authToken;
    }

    /**
     * @param $fbAuth
     * @param $page_id
     * @param $authToken
     * @return mixed
     */
    protected function getPostJsonObject($fbAuth, $page_id, $authToken,$apiEndPoint)
    {
        if ($fbAuth) {
            $accessToken = $fbAuth->getAuthToken();
            $postJson = self::fetchUrl(
                "$apiEndPoint/{$page_id}/feed?access_token={$accessToken}"
            );
        } else {
            $postJson = self::fetchUrl("https://graph.facebook.com/{$page_id}/feed?{$authToken}");
        }

        $postJsonObj = @json_decode($postJson);

        return $postJsonObj;
    }

    /**
     * @param $fbAuth
     * @param $page_id
     * @param $authToken
     * @param $fbUrl
     * @param $fbLkeCountRepo
     */
    protected function saveLastPostDateAndUpdateIsPostThatDay($fbAuth, $page_id, $authToken, $fbUrl, $fbLkeCountRepo,$apiEndPoint)
    {
        $postJsonObj = $this->getPostJsonObject($fbAuth, $page_id, $authToken,$apiEndPoint);

        if (property_exists($postJsonObj, 'data')) {
            $post = $postJsonObj->data;

            if (isset($post[0])) {
                $lastPost = self::toBerlinTime($post[0]->created_time);
                $fbUrl->setLastPost(new \DateTime($lastPost));
                $fbLkeCountRepo->updateIsPostThatDay($fbUrl, $lastPost);
            }
        }
        $fbUrl->setPageId($page_id);
        $this->em->persist($fbUrl);
        $this->em->flush();
    }

    /**
     * @param $fbAuth
     * @param $pageName
     * @param $apiEndPoint
     * @param $fbUrl
     * @return mixed
     */
    protected function getFbPageId($fbAuth, $pageName, $apiEndPoint, $fbUrl)
    {
        if ($fbAuth) {
            $page_json_object = $this->getFbPageResources(
                $pageName,
                $fbAuth->getAuthToken(),
                $apiEndPoint
            );
        } else {
            $page_json = self::fetchUrl("https://graph.facebook.com/{$pageName}");
            $page_json_object = @json_decode($page_json);
        }

        if (!$page_json_object || !property_exists($page_json_object, 'id')) {
            echo "Can't fetch page ID " . $fbUrl->getUrl() . "\n";

            return false;

        } else {
            return $page_json_object->id;
        }

    }

    /**
     * @param $fbUrl
     * @param $fbAuth
     * @param $apiEndPoint
     * @param $authToken
     * @param $fbLkeCountRepo
     */
    protected function facbookLastPost($fbUrl, $fbAuth, $apiEndPoint, $authToken, $fbLkeCountRepo)
    {
        $page_json_object = null;
        $postJsonObj = null;
        $page_id = $fbUrl->getPageId();

        if (!$page_id) {
            $page_id = self::extractPageIdFromUrl($fbUrl->getUrl());

            if (!$page_id) {
                $pageName = self::extractPageNameFromUrl($fbUrl->getUrl());
                $page_id = $this->getFbPageId($fbAuth, $pageName, $apiEndPoint, $fbUrl);
            }
        }

        if ($page_id) {
            $this->saveLastPostDateAndUpdateIsPostThatDay($fbAuth, $page_id, $authToken, $fbUrl, $fbLkeCountRepo,$apiEndPoint);
        }
    }
}



