<?php
/**
 * User: LITVAN
 * Date: 3/30/14
 * Time: 7:25 PM
 */

namespace Beon\IntranetBundle\Lib;


use Beon\IntranetBundle\Entity\User;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;


abstract class PaginationHelper
{
    public static function composeEntities(QueryBuilder $queryBuilder, $itemsOnPage, $page, $orderByOrDqlArrOrCallback = null)
    {
        $queryBuilder
            ->setMaxResults($itemsOnPage)
            ->setFirstResult($page * $itemsOnPage);


        if ($orderByOrDqlArrOrCallback) {
            if (is_callable($orderByOrDqlArrOrCallback)) {
                call_user_func($orderByOrDqlArrOrCallback, $queryBuilder);
            } else {
                if (!is_array($orderByOrDqlArrOrCallback)) {
                    $orderByOrDqlArrOrCallback = array(array('orderBy', 'obj.' . $orderByOrDqlArrOrCallback));
                }
                foreach ($orderByOrDqlArrOrCallback as $dqlPart) {
                    $queryBuilder->add($dqlPart[0], $dqlPart[1], true);
                }
            }
        }

        return $queryBuilder
            ->getQuery()
            ->getResult();
    }

    public static function getPagesCount(QueryBuilder $queryBuilder, $itemsOnPage, $qbCallback = null)
    {
        $queryBuilder = clone($queryBuilder);
        if (is_callable($qbCallback)) {
            call_user_func($qbCallback, $queryBuilder);
        } 
        
        $result = $queryBuilder
            ->select('count(obj.id)')
            ->getQuery()
            ->getSingleScalarResult();

        return ceil($result / $itemsOnPage);
    }

    public static function composeIndex(Controller $controller, Request $request, $entityName, $itemsOnPage, $orderByOrDqlArrOrCallback = null)
    {
        $page = 0;
        $pageFromRequest = $request->request->get('currentPage');
        $page = $pageFromRequest ? $pageFromRequest : $page;

        /** @var $repository EntityRepository */
        $repository = $controller->getDoctrine()->getRepository('IntranetBundle:' . $entityName);

        $entities = PaginationHelper::composeEntities($repository->createQueryBuilder('obj'), $itemsOnPage, $page, $orderByOrDqlArrOrCallback);
        $pagesCount = PaginationHelper::getPagesCount($repository->createQueryBuilder('obj'), $itemsOnPage);

        if ($request->isXmlHttpRequest()) {
            return $controller->render('IntranetBundle:' . $entityName . ':indexTable.html.twig', array(
                'entities' => $entities
            ));
        } else {
            return $controller->render('IntranetBundle:' . $entityName . ':index.html.twig', array(
                'entities' => $entities,
                'pagesCount' => $pagesCount
            ));
        }

    }

    public static function composeIndexWithUserCheck(Controller $controller, Request $request, $entityName, $itemsOnPage, $orderByOrDqlArrOrCallback = null)
    {
        $page = 0;
        $pageFromRequest = $request->request->get('currentPage');
        $page = $pageFromRequest ? $pageFromRequest : $page;
        $ajax = $request->request->get('ajax');

        /** @var $repository EntityRepository */
        $repository = $controller->getDoctrine()->getRepository('IntranetBundle:' . $entityName);
        /** @var $securityContext SecurityContext */
        $securityContext = $controller->get('security.context');
        /** @var $user \Beon\IntranetBundle\Entity\User */
        $user = $securityContext->getToken()->getUser();

        $queryBuilder = $repository->createQueryBuilder('obj');

        if ($user && $user instanceof User && $user->getCustomer()) {
            $queryBuilder
                ->where('obj.customer = :customerId')
                ->setParameter('customerId', $user->getCustomer()->getId());
        }

        $pagesCount = self::getPagesCount($queryBuilder, $itemsOnPage, $orderByOrDqlArrOrCallback);
        $entities = self::composeEntities($queryBuilder, $itemsOnPage, $page, $orderByOrDqlArrOrCallback);

        if ($ajax) {
            return $controller->render('IntranetBundle:' . $entityName . ':indexTable.html.twig', array(
                'entities' => $entities,
            ));
        } else {
            return $controller->render('IntranetBundle:' . $entityName . ':index.html.twig', array(
                'entities' => $entities,
                'pagesCount' => $pagesCount
            ));
        }

    }
    

    public static function composeFilterIndexWithUserCheck(Controller $controller, Request $request, $entityName, $itemsOnPage, $orderByOrDqlArrOrCallback = null, $filterData)
    {
	$repository = $filterData['repository'];
	
        $page = 0;
        $pageFromRequest = $request->request->get('currentPage');
        $page = $pageFromRequest ? $pageFromRequest : $page;
        $ajax = $request->request->get('ajax');

        /** @var $securityContext SecurityContext */
        $securityContext = $controller->get('security.context');
        /** @var $user \Beon\IntranetBundle\Entity\User */
        $user = $securityContext->getToken()->getUser();

        $queryBuilder = $repository->createQueryBuilder('obj');

        if ($user && $user instanceof User && $user->getCustomer()) {
            $queryBuilder
                ->where('obj.customer = :customerId')
                ->setParameter('customerId', $user->getCustomer()->getId());
        }

        $pagesCount = self::getPagesCount($queryBuilder, $itemsOnPage, $orderByOrDqlArrOrCallback);
        $entities = self::composeEntities($queryBuilder, $itemsOnPage, $page, $orderByOrDqlArrOrCallback);

        if ($ajax) {
            return $controller->render('IntranetBundle:' . $entityName . ':indexTable.html.twig', array(
                'entities' => $entities,
            ));
        } else {
            return $controller->render('IntranetBundle:' . $entityName . ':index.html.twig', array(
                'entities' => $entities,
                'pagesCount' => $pagesCount,
                'filterForm'=>$filterData['filterForm']
            ));
        }

    }
        
    public static function composeFilterIndex(Controller $controller, Request $request, $entityName, $itemsOnPage, $orderByOrDqlArrOrCallback = null, $filterData)
    {    
	
	$repository = $filterData['repository'];
        $page = 0;
        $pageFromRequest = $request->request->get('currentPage');
        $page = $pageFromRequest ? $pageFromRequest : $page;

        $entities = PaginationHelper::composeEntities($repository->createQueryBuilder('obj'), $itemsOnPage, $page, $orderByOrDqlArrOrCallback);
        $pagesCount = PaginationHelper::getPagesCount($repository->createQueryBuilder('obj'), $itemsOnPage, $orderByOrDqlArrOrCallback);

        if ($request->isXmlHttpRequest()) {
            return $controller->render('IntranetBundle:' . $entityName . ':indexTable.html.twig', array(
                'entities' => $entities
            ));
        } else {
            return $controller->render('IntranetBundle:' . $entityName . ':index.html.twig', array(
                'entities' => $entities,
                'pagesCount' => $pagesCount,
                'filterForm'=>$filterData['filterForm']
            ));
        }
    }

} 
