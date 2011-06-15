<?php

namespace Xaav\QueueBundle\AMQP;

use Xaav\QueueBundle\JobQueue\JobQueueInterface;

class JobQueue implements JobQueueInterface
{
    protected $queue;
    protected $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

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
        $message = $this->queue->consume();
        $job = new Job();
        $job->setCallable($message);

        return $job;
    }
}