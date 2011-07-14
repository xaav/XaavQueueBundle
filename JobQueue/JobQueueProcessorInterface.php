<?php

namespace Xaav\QueueBundle\JobQueue;

use Xaav\QueueBundle\JobQueue\Provider\JobQueueProviderInterface;

interface JobQueueProcessorInterface
{
    /**
     * Constructor.
     */
    public function __construct(JobQueueProviderInterface $provider);

    /**
     * Processes the specified queue.
     *
     * @return boolean Whether the queue contains more jobs.
     */
    public function process($queueName);
}