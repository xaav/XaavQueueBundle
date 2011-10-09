<?php

namespace Xaav\QueueBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class ProcessQueueCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('xaav:queue:process')
            ->setDescription('Process the specified queue')
            ->setDefinition(array(
                new InputArgument('name', InputArgument::REQUIRED, 'The queue to process'),
            ));
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$processor = $this->getContainer()
    		->get('xaav.queue.processor');

    	$queueName = $input->getArgument('name');

    	$output->writeln('Processing Queue, press Ctrl+C to stop');

    	while (true) {
    		$output->writeln('Checking for jobs...');
    		while (!$processor->process($queueName)) {
    			$output->writeln('Processed Job');
    		}
    		$output->writeln('Sleeping for three seconds...');
    		sleep(3);
    	}
    }
}
