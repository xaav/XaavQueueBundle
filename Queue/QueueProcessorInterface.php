<?php

namespace Xaav\QueueBundle\Queue;

interface QueueProcessorInterface
{
    /**
     * Constructor.
     */
    public function __construct( $provider);

    /**
     * Processes the specified queue.
     *
     * @return boolean Whether the queue contains more jobs.
     */
    public function process($queueName);
}