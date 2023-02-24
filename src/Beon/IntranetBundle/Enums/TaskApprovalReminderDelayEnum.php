<?php

namespace Beon\IntranetBundle\Enums;

use Beon\IntranetBundle\Entity\EnumValue;
use Doctrine\ORM\QueryBuilder;

class TaskApprovalReminderDelayEnum extends BasicDbEnum
{
    const DEFAULT_DELAY = 1200;

    public static function amendQueryBuilder(QueryBuilder $qb) {
        $em = self::$container->get('doctrine.orm.entity_manager');
        $choices = $em->getRepository('IntranetBundle:EnumValue')->getAllValues(self::getSimpleName());
        $orX = $qb->expr()->orX();
        foreach ($choices as $choice) {
            $first = intVal($choice->getValueIdx(0, '/'));
            $last = intVal($choice->getValueIdx(1, '/'));
            if ($first < 1) $first = 3;
            if ($last < 1) $last = 3;
            $orX->add($qb->expr()->andX(
                $qb->expr()->eq('t.approvalReminderDelay', $choice->getId()),
                $qb->expr()->orX(
                    $qb->expr()->andX(
                        $qb->expr()->eq('t.firstApprovalMailSentAt', 't.lastApprovalMailSentAt'),
                        $qb->expr()->lt('t.firstApprovalMailSentAt', ':first' . $choice->getId())
                    ),
                    $qb->expr()->andX(
                        $qb->expr()->lt('t.firstApprovalMailSentAt', 't.lastApprovalMailSentAt'),
                        $qb->expr()->lt('t.lastApprovalMailSentAt', ':last' . $choice->getId())
                    )
                )
            ));
            $qb->setParameter('first' . $choice->getId(), date('Y-m-d H:i:s', strtotime('-' . $first . ' days')));
            $qb->setParameter('last' . $choice->getId(), date('Y-m-d H:i:s', strtotime('-' . $last . ' days')));
        }
        $qb->andWhere($orX);
    }
}
