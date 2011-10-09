<?php

namespace Xaav\QueueBundle\Queue\Adapter;

interface QueueAdapterInterface
{
	public function __construct(array $options);

	/**
	 * Gets a Job from the specified queue
	 *
	 * @param string $queue The queue to get the job from
	 *
	 * @return JobInterface A job that needs to be processed
	 */
	public function get($queue);

	/**
	 * Add the job to the specified queue
	 *
	 * @param string $queue The queue to add the job to
	 * @param string $job The job to add
	 */
	public function add($queue, $job);
}