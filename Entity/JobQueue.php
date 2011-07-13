<?php

namespace Xaav\QueueBundle\Entity;

use Xaav\QueueBundle\JobQueue\JobQueue\JobQueueInterface;
use Xaav\QueueBundle\JobQueue\JobQueue\AbstractJobQueue;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Xaav\QueueBundle\Entity\JobQueueRepository")
 */
class JobQueue extends AbstractJobQueue implements JobQueueInterface
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
     * @ORM\Column(type="string")
     */
    protected $jobs;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    protected function getJobs()
    {
        return unserialize($this->jobs);
    }

    protected function setJobs($jobs)
    {
        $this->jobs = serialize($jobs);
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
}