<?php
namespace Xaav\QueueBundle\Command;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Bundle\FrameworkBundle\Command\Command;

class JobQueueProcessCommand extends Command {

	protected function configure() {

		parent::configure();

		$this
			->setName('xaav:queue:process')
			->addArgument('queue', InputArgument::REQUIRED, 'Job Queue ID')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output) {

        $entityManager = $this->container->get('doctrine')->getEntityManager();

        $jobQueue = $entityManager->find('XaavQueueBundle:Job', $input->getArgument('queue'));

        while ($job = $jobQueue->getJob()) {

            $job->getJobCallable()->call();
        }
	}
}