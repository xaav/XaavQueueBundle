<?php

namespace Xaav\QueueBundle\JobQueue\Job;

interface JobInterface
{
    /**
     * Run the next pass of the Job
     */
    public function pass();
}