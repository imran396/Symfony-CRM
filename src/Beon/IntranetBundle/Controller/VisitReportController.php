<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Enums\NoteTypeEnum;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VisitReportController extends Controller
{
    public function reportAction()
    {
        $repo = $this->getDoctrine()->getRepository('IntranetBundle:Note');
        $qb = $repo->createQueryBuilder('n');
        $qb->andWhere('n.type = ' . NoteTypeEnum::AGENDA);
        $qb->andWhere('n.customer IS NOT NULL');
        $qb->groupBy('n.customer');
        
        $customers = array();
        foreach($qb->getQuery()->getResult() as $row) {
            if ($row->getCustomer()->getLevel() == 2) {
                $customer = $row->getCustomer();
            } else if ($row->getCustomer()->getLevel() > 2) {
                $customer = $row->getCustomer()->getParent();
            }
            $customers[$customer->getId()] = $customer;
        }
        
        $report = array();
        $today = new \DateTime('today');
        foreach ($customers as $customer) {
            $notes = $repo->getAgendaDates($customer);
            $last_visit = null;
            $next_visit = null;
            $missing_dates = 0;
            foreach ($notes as $note) {
                if ($note->getDate1() != $today) {
                    if ($note->getDate1() < $today) {
                        $last_visit = $note->getDate1();
                    } else if (!$next_visit) {
                        $next_visit = $note->getDate1();
                    }
                } else {
                    $missing_dates++;
                }
            }
            $report[] = array(
                'customer' => $customer,
                'count' => count($notes),
                'missing_dates' => $missing_dates,
                'last_visit' => $last_visit,
                'next_visit' => $next_visit,
            );
        }
        usort($report, function($a, $b) {
            $a = $a['last_visit'];
            $b = $b['last_visit'];
            if ($a == $b) {
                return 0;
            } else {
                return $a < $b ? -1 : 1;
            }
        });

        return $this->render('IntranetBundle:VisitReport:report.html.twig', array(
            'report' => $report,
        ));    
    }
}
