<?php

namespace Xaav\QueueBundle\AMQP;

use Xaav\QueueBundle\JobQueue\JobQueueInterface;

class JobQueue implements JobQueueInterface
{
    protected $exchange;
    protected $queue;
    protected $connection;

    /**
     * The routing key
     */
    protected $routingKey;
    protected $exchangeName;

    public function setRoutingKey($routingKey)
    {
        $this->routingKey = $routingKey;
    }

    public function getRoutingKey()
    {
        return $this->routingKey;
    }

    public function setExchangeName($exchangeName)
    {
        $this->exchangeName = $exchangeName;
    }

    public function getExchangeName()
    {
        return $this->exchangeName;
    }

    public function __construct(\AMQPConnection $connection = null)
    {
        $this->connection = $connection;
    }

    public function addJob(Job $job)
    {
        //
    }

    public function getJob()
    {

    }
}