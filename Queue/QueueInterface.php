<?php

namespace Xaav\QueueBundle\Queue;

use Xaav\QueueBundle\Queue\Job\JobInterface;

interface QueueInterface
{
    /**
     * Get a Job from the Queue
     *
     * @return JobInterface
     */
    public function get();

    /**
     * Add a Job to the Queue
     *
     * @param JobInterface $job
     */
    public function add(JobInterface $job);
}