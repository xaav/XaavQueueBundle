<?php

namespace Xaav\QueueBundle\JobQueue\Job;

/**
 * Helper class for Jobs
 */
abstract class AbstractJob implements JobInterface
{
    protected $count = 0;
    protected $initialized = false;

    /**
     * Lazy-loaded startup function.
     */
    protected function init()
    {
        //Do startup work here
    }

    public function pass()
    {
        if(!$this->initialized) {
            $this->init();
            $this->initialized = true;

            return false;
        }

        $result = $this->process($this->count);
        $this->count++;

        return $result;
    }

    abstract protected function process($count);
}