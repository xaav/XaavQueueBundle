<?php

namespace Xaav\QueueBundle\Queue\Job;

interface JobInterface
{
    /**
     * Process the job
     *
     * @return boolean True if the job is done
     */
    public function process();
}