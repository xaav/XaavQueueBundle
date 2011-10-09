<?php

namespace Xaav\QueueBundle\Queue;

use Xaav\QueueBundle\Queue\Adapter\QueueAdapterInterface;

class QueueProcessor implements QueueProcessorInterface
{
    protected $adapter;
    protected $cache;

    public function __construct(QueueAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return boolean True if there are no more jobs
     */
    public function process($queueName)
    {
        if(!$queue = $this->cache[$queueName]) {
            $queue = $this->cache[$queueName] = $this->adapter->get($queueName);
        }
        $job = $queue->get();

        if($job) {
            //Job exists

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
