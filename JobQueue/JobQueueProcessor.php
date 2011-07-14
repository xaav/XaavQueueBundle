<?php

namespace Xaav\QueueBundle\JobQueue;

use Xaav\QueueBundle\JobQueue\Provider\JobQueueProviderInterface;

class JobQueueProcessor implements JobQueueProcessorInterface
{
    protected $provider;

    public function __construct(JobQueueProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function process($queueName)
    {
        $jobqueue = $this->provider->getJobQueueByName($queueName);
        $job = $jobqueue->getJobFromQueue();

        if($job) {
            //Job exists
            if(!$job->pass()) {
                //Job is not done!
                $jobqueue->addJobToQueue($job);
            }

            //Could be another job
            return false;

        } else {
            //Job does not exist
            return true;
        }
    }
}
