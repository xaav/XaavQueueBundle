<?php

namespace Xaav\QueueBundle\Queue\Adapter;

use Xaav\QueueBundle\Entity\SerializedJob;

use Xaav\QueueBundle\Entity\Queue;

class DoctrineAdapter implements QueueAdapterInterface
{
    protected $entityManager;

	public function __construct(array $options)
	{
		$container = $options['service_container'];
		$this->entityManager = $container->get('doctrine')->getEntityManager();
	}

	/**
	 * @return Queue
	 */
	protected function getQueue($name)
	{
		$queue = $this->entityManager
			->getRepository('XaavQueueBundle:Queue')
			->findOneByName($name);

		if (!$queue) {

			$queue = new Queue();
			$queue->setName($name);

			$this->entityManager->persist($queue);
		}elseif ($queue->getSerializedJobs()->count() == 0) {
			$this->entityManager->refresh($queue);
		}

		return $queue;
	}

    public function get($name)
    {
    	$queue = $this->getQueue($name);

    	$serializedJob = $queue->getSerializedJobs()->last();
    	if ($serializedJob) {
	    	$serializedJob->setQueue();

	    	$this->entityManager->remove($serializedJob);
	    	$this->entityManager->flush();

	        return $serializedJob->getData();
    	}
    }

    public function add($name, $job)
    {
    	$queue = $this->getQueue($name);

    	$serializedJob = new SerializedJob();
    	$serializedJob->setData($job);
    	$serializedJob->setQueue($queue);

    	$this->entityManager->persist($serializedJob);
    	$this->entityManager->flush();
    }
}
