<?php

namespace Xaav\QueueBundle\JobQueue\Provider;

use Xaav\QueueBundle\AMQP\JobQueue;

class AMQPProvider implements JobQueueProviderInterface
{
    //TODO: Create provider
    //See http://www.php.net/manual/en/amqp.examples.php

    public function getJobQueueByName($name)
    {
        //
    }

    public function createQueue(JobQueue $queue)
    {
        //
    }
}