<?php

namespace Xaav\QueueBundle\JobQueue\JobQueue;

class DoctrineJobQueue extends AbstractJobQueue implements JobQueueInterface
{
    protected function getJobs()
    {
        if($jobs = base64_decode(unserialize($this->jobs))) {

            return $jobs;
        } else {

            return array();
        }
    }

    protected function setJobs($jobs)
    {
        $this->jobs = base64_encode(serialize($jobs));
    }
}