<?php

namespace Beon\IntranetBundle\Controller;

use Beon\IntranetBundle\Enums\TaskTypeEnum;
use Beon\IntranetBundle\Enums\TimetrackingTariffEnum;
use Beon\IntranetBundle\Enums\TaskStatusEnum;
use Beon\IntranetBundle\Enums\TaskPaymentTypeEnum;
use Beon\IntranetBundle\Enums\TaskPaperTypeEnum;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MissingTimetrackingsReportController extends Controller
{
    public function reportAction()
    {
        $report = array();

        foreach($this->getQb()->getQuery()->getResult() as $row) {
            $report[] = array('task' => $row[0], 'print' => $row[1], 'graphics' => $row[2]);
        }

        return $this->render('IntranetBundle:MissingTimetrackingsReport:report.html.twig', array(
            'report' => $report
        ));
    }

    private function getQb() {
        $repo = $this->getDoctrine()->getRepository('IntranetBundle:Task');
        $qb = $repo->createQueryBuilder('t');
        $qb->select(array('t', 'COUNT(ttprint)', 'COUNT(ttnonprint)'));
        $qb->andWhere('t.customer IS NOT NULL');
        $qb->andWhere('t.type = ' . TaskTypeEnum::GRAPHICS);
        $qb->andWhere('t.status = ' . TaskStatusEnum::DONE);
        $qb->leftJoin('t.timetrackings', 'ttprint', 'WITH', 'IDENTITY(ttprint.tariff) IN (:printIds)');
        $qb->leftJoin('t.timetrackings', 'ttnonprint', 'WITH', 'IDENTITY(ttnonprint.tariff) NOT IN (:printIds)');
        $categories = TimetrackingTariffEnum::getCategories();
        $qb->setParameter('printIds', $categories['Druckkosten']);
        $qb->groupBy('t.id');
        $qb->having('(COUNT(ttprint) = 0 AND t.paperType != ' . TaskPaperTypeEnum::NONE . ') OR COUNT(ttnonprint) = 0');
        return $qb;
    }
}
