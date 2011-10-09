<?php

namespace Xaav\QueueBundle\Queue;

use Xaav\QueueBundle\Queue\Adapter\QueueAdapterInterface;

interface QueueProcessorInterface
{
    /**
     * Constructor.
     */
    public function __construct(QueueAdapterInterface $adapter);

    /**
     * Processes the specified queue.
     *
     * @return boolean Whether the queue contains more jobs.
     */
    public function process($queueName);
}