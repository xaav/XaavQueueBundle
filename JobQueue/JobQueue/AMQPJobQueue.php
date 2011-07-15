<?php

namespace Xaav\QueueBundle\AMQP;

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
        $this->exchange->publish($message, $this->getRoutingKey());
    }

    protected function get()
    {
        return $this->queue->get();
    }

    public function addJob(Job $job)
    {
        $this->initialize();
        $this->publish($job->getCallable());
    }

    public function getJob()
    {
        $this->initialize();
        $job = new Job();
        $job->setCallable($this->get());

        return $job;
    }
}