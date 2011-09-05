<?php

namespace Xaav\QueueBundle\JobQueue\JobQueue;

use Xaav\QueueBundle\Entity\SerializedJob;
use Xaav\QueueBundle\JobQueue\Job\JobInterface;
use Doctrine\Common\Collections\ArrayCollection;

class DoctrineJobQueue implements JobQueueInterface
{
	/**
	 * @var ArrayCollection
	 */
	protected $serializedJobs;

    public function getJobFromQueue()
    {
    	$serializedJob = $this->serializedJobs->last();
    	$this->serializedJobs->remove($this->serializedJobs->key());

    	return unserialize($serializedJob->getData());
    }

    public function addJobToQueue(JobInterface $job)
    {
    	$serializedJob = new SerializedJob();
    	$serializedJob->setData(serialize($job));

    	$this->serializedJobs->add($serializedJob);
    }
}