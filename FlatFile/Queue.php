<?php

namespace Xaav\QueueBundle\FlatFile;

use Xaav\QueueBundle\Queue\Job\JobInterface;
use Xaav\QueueBundle\Queue\QueueInterface;

class FlatFileQueue implements QueueInterface
{
    protected $source;

    public function __construct($source)
    {
        $this->source = $source;
    }

    protected function getJobs()
    {
        if(is_array($jobs = @unserialize(file_get_contents($this->source)))) {
           return $jobs;
        }
        else {
            return array();
        }
    }

    protected function setJobs($jobs)
    {
        @file_put_contents($this->source, serialize($jobs));
    }

    protected function addJob($job)
    {
        $jobs = $this->getJobs();
        array_push($jobs, $job);
        $this->setJobs($jobs);
    }

    protected function getJob()
    {
        $jobs = $this->getJobs();
        $job = array_pop($jobs);
        $this->setJobs($jobs);

        return $job;
    }

    public function add(JobInterface $job)
    {
        $this->addJob(serialize($job));
    }

    public function get()
    {
        return unserialize($this->getJob());
    }
}
