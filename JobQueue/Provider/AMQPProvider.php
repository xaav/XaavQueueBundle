<?php

namespace Xaav\QueueBundle\JobQueue\Provider;

use Xaav\QueueBundle\AMQP\JobQueue;

class AMQPProvider implements JobQueueProviderInterface
{
    //TODO: Create provider
    //See http://www.php.net/manual/en/amqp.examples.php

    protected $connection;
    protected $params;

    public function __construct(AMQPConnection $connection, array $params)
    {
        $this->connection = $connection;
        $this->params = $params;
    }

    public function getJobQueueByName($name)
    {
        $queue = new JobQueue($this->connection);
        $queue->setExchangeName($this->params['exchange']);
        $queue->setRoutingKey($name);
    }
}