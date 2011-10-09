<?php

namespace Xaav\QueueBundle\Queue;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Xaav\QueueBundle\Queue\Adapter\QueueAdapterInterface;

class QueueManager
{
	protected $adapter;
	protected $container;

	public function __construct(QueueAdapterInterface $adapter, ContainerInterface $container)
	{
		$this->adapter = $adapter;
		$this->container = $container;
	}

	/**
	 * Return a queue with the specified name
	 *
	 * @param string $name The name of the queue to return
	 */
	public function get($queue)
	{
		return new Queue($this->adapter, $this->container, $name);
	}
}