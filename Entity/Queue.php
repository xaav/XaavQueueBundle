<?php

namespace Xaav\QueueBundle\Entity;

use Xaav\QueueBundle\Queue\Job\JobInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Queue
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
    * Add serializedJobs
    */
    public function addSerializedJobs(SerializedJob $serializedJobs)
    {
    	$this->serializedJobs[] = $serializedJobs;
    }

    /**
     * Get serializedJobs
     */
    public function getSerializedJobs()
    {
    	return $this->serializedJobs;
    }
}