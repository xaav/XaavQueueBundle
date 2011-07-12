<?php

namespace Xaav\QueueBundle\JobQueue\JobQueue;

use Xaav\QueueBundle\JobQueue\Job\JobInterface;

abstract class AbstractJobQueue implements JobQueueInterface
{
    abstract protected function setJobs($jobs);

    abstract protected function getJobs();

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

    public function addJobToQueue(JobInterface $job)
    {
        $this->addJob(serialize($job));
    }

    public function getJobFromQueue()
    {
        return unserialize($this->getJob());
    }
}