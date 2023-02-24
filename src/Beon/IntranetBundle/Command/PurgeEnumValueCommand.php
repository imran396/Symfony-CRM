<?php

namespace Beon\IntranetBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class PurgeEnumValueCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('beon:purgeEnumValues')
            ->setDescription('Purge Enum Values');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $doctrine = $this->getContainer()->get('doctrine');
	    $em = $doctrine->getManager();
        $allValues = $em->getRepository('IntranetBundle:EnumValue')->createQueryBuilder('v')->where('v.id > 8095')->getQuery()->getResult();

        foreach ($allValues as $value) {
            try {
                $em->getConnection()->transactional(function($conn) use ($em, $value) {
                    $qb = $em->createQueryBuilder();
                    $qb->delete('Beon\IntranetBundle\Entity\EnumValue', 'v');
                    $qb->andWhere('v = :value');
                    $qb->setParameter(':value', $value);
                    $qb->getQuery()->execute();
                });
                echo 'Deleting: ' . $value->getId() . ' ' . $value->getClassName()  . ' ' . $value->getValue()  . "\n";
            } catch (\Doctrine\DBAL\DBALException $e) {
                echo 'Not deleting: ' . $value->getId() . "\n";
            }
        }
    }
}	
?>
