<?php

namespace Xaav\QueueBundle\JobQueue\JobQueue;

use Xaav\QueueBundle\JobQueue\Job\JobInterface;

interface JobQueueInterface
{
    /**
     * Get a Job from the Queue
     *
     * @return JobInterface
     */
    public function getJobFromQueue();

    /**
     * Add a Job to the Queue
     *
     * @param JobInterface $job
     */
    public function addJobToQueue(JobInterface $job);
}