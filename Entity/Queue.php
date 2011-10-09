<?php

namespace Xaav\QueueBundle\Entity;

use Doctrine\ORM\EntityManager;
use Xaav\QueueBundle\Queue\Job\JobInterface;
use Xaav\QueueBundle\Queue\QueueInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Queue implements QueueInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="SerializedJob", mappedBy="queue")
     */
    protected $serializedJobs;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * Constructor
     */
    public function __construct()
    {
    	$this->serializedJobs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get the name of the Queue
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name of the Queue
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Entity Manager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
    	$this->entityManager = $entityManager;
    }

    /**
     * {@InheritDoc}
     */
    public function get()
    {
    	$serializedJob = $this->serializedJobs->last();
    	if ($serializedJob) {
    		$this->serializedJobs->removeElement($serializedJob);
    		$this->entityManager->remove($serializedJob);

    		$this->entityManager->flush();

    		return unserialize($serializedJob->getData());
    	}
    }

    /**
     * {@InheritDoc}
     */
    public function add(JobInterface $job)
    {
    	$serializedJob = new SerializedJob();
    	$serializedJob->setData(serialize($job));
    	$serializedJob->setQueue($this);

    	$this->serializedJobs->add($serializedJob);
    	$this->entityManager->persist($serializedJob);

    	$this->entityManager->flush();
    }
}