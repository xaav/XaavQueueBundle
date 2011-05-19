<?php

namespace Xaav\QueueBundle\JobQueue;

class Job implements JobInterface
{
    public $callable;

    public function execute()
    {
        $callable = unserialize($this->callable);
        $callable->call();
    }

    public function __construct(JobCallableInterface $callable)
    {
        $this->callable = serialize($callable);
    }
}