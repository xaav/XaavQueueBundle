<?php

namespace Xaav\QueueBundle\Queue;

use Xaav\QueueBundle\Queue\Job\JobInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Xaav\QueueBundle\Queue\Adapter\QueueAdapterInterface;

class Queue implements QueueInterface
{
	/**
	 * @var QueueAdapterInterface
	 */
	protected $adapter;

	/**
	 * @var ContainerInterface
	 */
	protected $container;
	protected $name;

	public function __construct(QueueAdapterInterface $adapter, ContainerInterface $container, $name)
	{
		$this->adapter = $adapter;
		$this->container = $container;
		$this->name = $name;
	}

	public function get()
	{
		$job = unserialize($this->adapter->get($this->name));
		if ($job instanceof ContainerAwareInterface) {
			$job->setContainer($this->container);
		}

		return $job;
	}

	public function add(JobInterface $job)
	{
		$this->adapter->add($this->name, serialize($job));
	}
}