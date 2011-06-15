<?php

namespace Xaav\QueueBundle\AMQP;

use Xaav\QueueBundle\JobQueue\JobQueueInterface;

class JobQueue implements JobQueueInterface
{
    protected $queue;

    public function __construct(\AMQPQueue $queue = null)
    {
        $this->queue = $queue;
    }

    public function addJob(Job $job)
    {
        //
    }

    public function getJob()
    {
        //
    }
}