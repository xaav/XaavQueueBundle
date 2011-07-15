<?php

namespace Xaav\QueueBundle\AMQP;

use Xaav\QueueBundle\Exception\InvalidCallableException;
use Xaav\QueueBundle\JobQueue\Job\JobInterface;

class AMQPJobQueue implements JobQueueInterface
{
    protected $exchange;
    protected $queue;
    protected $connection;

    /**
     * The routing key
     */
    protected $routingKey;
    protected $exchangeName;

    protected $initialized;

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

    protected function initialize()
    {
        if(!$this->initialized) {
            if(!$this->connection->isConnected) {

                $this->connection->connect();
            }

            $ex = new AMQPExchange($this->connection);
            $ex->declare($this->getExchangeName(), AMQP_EX_TYPE_FANOUT);

            $q = new AMQPQueue($this->connection);
            $q->declare(rand());
            $q->bind($this->getExchangeName(), $this->getRoutingKey());

            $this->queue = $q;
            $this->exchange = $ex;
        }
    }

    protected function publish($message)
    {
        $this->initialize();
        $this->exchange->publish($message, $this->getRoutingKey());
    }

    protected function get()
    {
        $this->initialize();
        return $this->queue->get();
    }

    public function addJobToQueue(JobInterface $job)
    {
        $this->publish(serialize($job));
    }

    public function getJobFromQueue()
    {
        $job = unserialize($this->get());

        if($job instanceof JobInterface) {
            return $job;
        } else {
            throw new InvalidCallableException($job);
        }
    }
}