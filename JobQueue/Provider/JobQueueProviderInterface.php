<?php

namespace Xaav\QueueBundle\JobQueue\Provider;

use Xaav\QueueBundle\JobQueue\JobQueueInterface;

interface JobQueueProviderInterface
{
    /**
     * @return JobQueueInterface
     */
    public function getJobQueueByName($name);
}