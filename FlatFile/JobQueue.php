<?php

namespace Xaav\QueueBundle\FlatFile;

use Xaav\QueueBundle\JobQueue\JobQueue\AbstractJobQueue;
use Xaav\QueueBundle\JobQueue\JobQueue\JobQueueInterface;

class JobQueue extends AbstractJobQueue implements JobQueueInterface
{
    protected $location;

    public function __construct($location)
    {
        $this->location = $location;
    }

    protected function getJobs()
    {
        return @file_get_contents($this->location);
    }

    protected function setJobs($jobs)
    {
        file_put_contents($this->location, $jobs);
    }
}
