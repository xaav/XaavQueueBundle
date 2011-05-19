<?php

namespace Xaav\QueueBundle\JobQueue;

interface JobQueueCallableInterface
{
    /**
     * Execute the job operation.
     */
    public function call();
}