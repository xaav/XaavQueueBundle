<?php

namespace Xaav\QueueBundle\AMQP;

use Xaav\QueueBundle\JobQueue\JobCallableInterface;
use Xaav\QueueBundle\JobQueue\JobInterface;
use Xaav\QueueBundle\Exception\InvalidCallableException;

class Job implements JobInterface
{
    protected $callable;

    public function __construct(JobCallableInterface $callable = null)
    {
        $this->callable = serialize($callable);
    }

    public function setCallable($message)
    {
        $this->callable = $message;
    }

    public function getCallable()
    {
        return $this->callable;
    }

    public function execute()
    {
        $callable = unserialize($this->callable);

        if($callable instanceof JobCallableInterface){
            $callable->call();
        }
        else {
            throw new InvalidCallableException($callable);
        }
    }
}