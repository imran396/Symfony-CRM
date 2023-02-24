<?php

namespace Beon\IntranetBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ReminderCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('beon:sendReminders')
            ->setDescription('Notification emails for reminders')
	    ->addArgument('type', InputArgument::OPTIONAL, 'Which mail you want to send, press release, task or campaign?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
	$cronType = $input->getArgument('type');
        $reminderMailService = $this->getContainer()->get('ReminderMailService');

	$reminderMailService->send($cronType);	
    }
}
?>
