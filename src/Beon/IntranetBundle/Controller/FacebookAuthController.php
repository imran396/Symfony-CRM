<?php

namespace Beon\IntranetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Beon\IntranetBundle\Entity\FacebookAuth;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookRequestException;
use Facebook\FacebookSession;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * FacebookAuth controller.
 *
 */
class FacebookAuthController extends Controller
{

    public function authAction()
    {
        $helper = $this->fbHelper();
        $loginUrl = $helper->getLoginUrl();
         $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IntranetBundle:FacebookAuth')->findAll();

        return $this->render(
            'IntranetBundle:FacebookAuth:index.html.twig',
            array(
                'fbloginurl' => $loginUrl,
                'entities' => $entities
            )
        );
    }

    public function accessTokenAction()
    {
        list($app_id, $app_secret) = $this->getAppIdAndSecret();
        $helper = $this->fbHelper();
         try {
            $session = $helper->getSessionFromRedirect();
        } catch (FacebookRequestException $ex) {
             echo $ex->getMessage();
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
        if ($session) {

            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetBundle:FacebookAuth')->find(1);
            if(empty($entity)){
                 $entity = new FacebookAuth();
            }
            $longLivedToken = $session->getLongLivedSession($app_id, $app_secret);
            $tokenValue = $longLivedToken->getToken();
            $expireAt = $longLivedToken->getAccessToken()->getExpiresAt();
            $entity->setAuthToken($tokenValue);
            $entity->setExpiresAt($expireAt);
            $entity->setCreatedAt(new \DateTime());
            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('facebook_auth_path'));
    }

    public  function fbHelper()
    {
        $request = $this->getRequest();
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        list($app_id, $app_secret) = $this->getAppIdAndSecret();
        FacebookSession::setDefaultApplication($app_id, $app_secret);
        $redirectUrl = $this->container->getParameter('fbRedirectUrl');
        if(empty($redirectUrl)){
            $redirectUrl = $baseurl.$this->generateUrl('facebook_accesstoken');
        }
        return  new FacebookRedirectLoginHelper($redirectUrl);

    }

    /**
     * @return array
     */
    private function getAppIdAndSecret()
    {
        $app_id = $this->container->getParameter('fb_app_id');
        $app_secret = $this->container->getParameter('fb_app_secret');

        return array($app_id, $app_secret);
    }

}
