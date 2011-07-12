<?php

namespace Xaav\QueueBundle\JobQueue\Job;

/**
 * Helper class for Jobs
 */
abstract class AbstractJob implements JobInterface
{
    protected $count = 0;

    public function pass()
    {
        $this->process($this->count);
        $this->count++;
    }

    protected function process($count)
    {
        //
    }
}