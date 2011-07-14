<?php

namespace Xaav\QueueBundle\JobQueue\Job;

interface JobInterface
{
    /**
     * Run the next pass of the Job
     *
     * @return boolean Whether the job is done or not.
     */
    public function pass();
}