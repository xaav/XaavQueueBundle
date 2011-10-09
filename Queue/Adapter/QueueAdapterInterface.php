<?php

namespace Xaav\QueueBundle\Queue\Adapter;

interface QueueAdapterInterface
{
	public function __construct(array $options);

	/**
	 * Gets the queue with the specified name from this provider.
	 *
	 * @param string $name A unique identifier of the queue
	 */
	public function get($name);
}