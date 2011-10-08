<?php

namespace Xaav\QueueBundle\JobQueue\JobQueue;

use Doctrine\ORM\EntityManager;
use Xaav\QueueBundle\Entity\SerializedJob;
use Xaav\QueueBundle\JobQueue\Job\JobInterface;
use Doctrine\Common\Collections\ArrayCollection;

class DoctrineJobQueue implements JobQueueInterface
{
	/**
	 * @var ArrayCollection
	 */
	protected $serializedJobs;

	/**
	 * @var EntityManager
	 */
	protected $entityManager;

	public function setEntityManager(EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}

    public function getJobFromQueue()
    {
    	$serializedJob = $this->serializedJobs->last();
    	$this->entityManager->remove($serializedJob);

    	if ($serializedJob) {
    		return unserialize($serializedJob->getData());
    	}
    }

    public function addJobToQueue(JobInterface $job)
    {
    	$serializedJob = new SerializedJob();
    	$serializedJob->setData(serialize($job));
    	$serializedJob->setJobQueue($this);

    	$this->serializedJobs->add($serializedJob);
    }
}