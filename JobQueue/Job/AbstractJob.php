<?php

namespace Xaav\QueueBundle\JobQueue\Job;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

/**
 * Helper class for Jobs
 */
abstract class AbstractJob extends ContainerAware implements JobInterface, ContainerAwareInterface
{
    protected $count = 0;
    protected $booted = false;

    /**
     * Lazy-loaded startup function.
     */
    protected function boot()
    {
        //Do startup work here
    }

    public function pass()
    {
        if(!$this->booted) {
            $this->boot();
            $this->booted = true;

            return false;
        }

        $result = $this->process($this->count);
        $this->count++;

        return $result;
    }

    abstract protected function process($count);
}