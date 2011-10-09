<?php

namespace Xaav\QueueBundle\Queue;

use Xaav\QueueBundle\Queue\Adapter\QueueAdapterInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class QueueProcessor implements QueueProcessorInterface
{
    protected $adapter;
    protected $container;

    public function __construct(QueueAdapterInterface $adapter, ContainerInterface $container)
    {
        $this->adapter = $adapter;
        $this->container = $container;
    }

    /**
     * @return boolean True if there are no more jobs
     */
    public function process($queueName)
    {
        $queue = $this->adapter->get($queueName);
        $job = $queue->get();

        if($job) {
            //Job exists

        	if ($job instanceof ContainerAwareInterface) {
        		$job->setContainer($this->container);
        	}

            if(!$job->process()) {
                //Job is not done!
                $queue->add($job);
            }

            //Could be another job
            return false;

        } else {
            //Job does not exist
            return true;
        }
    }
}
