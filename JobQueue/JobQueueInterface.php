<?php

namespace Xaav\QueueBundle\JobQueue;

use Xaav\QueueBundle\Entity\Job;

interface JobQueueInterface
{
    /**
     * @return JobInterface
     */
    public function getJob();

    public function addJob(Job $job);
}