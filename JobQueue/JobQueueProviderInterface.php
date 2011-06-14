<?php

namespace Xaav\QueueBundle\JobQueue;

use Xaav\QueueBundle\Entity\JobQueue;

interface JobQueueProviderInterface
{
    public function getJobQueueByName($name);

    public function createQueue(JobQueue $queue);
}