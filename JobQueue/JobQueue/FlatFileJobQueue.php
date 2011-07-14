<?php

namespace Xaav\QueueBundle\JobQueue\JobQueue;

class JobQueue extends AbstractJobQueue implements JobQueueInterface
{
    protected $location;

    public function __construct($location)
    {
        $this->location = $location;
    }

    protected function getJobs()
    {
        if(is_array($jobs = @unserialize(file_get_contents($this->location)))) {
           return $jobs;
        }
        else {
            return array();
        }
    }

    protected function setJobs($jobs)
    {
        @file_put_contents($this->location, serialize($jobs));
    }
}
