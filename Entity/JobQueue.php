<?php

namespace Xaav\QueueBundle\Entity;

use Xaav\QueueBundle\JobQueue\JobQueueInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Xaav\QueueBundle\Entity\JobQueueRepository")
 */
class JobQueue implements JobQueueInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;

     /**
      * @ORM\OneToMany(targetEntity="Job", mappedBy="JobQueue")
      */
     protected $jobs;

    /**
     * Get a Job
     */
    public function getJob()
    {
        $job = $this->jobs->first();
        $this->jobs->remove($this->jobs->key());

        return $job;
    }

    public function addJob(Job $job)
    {
        $this->jobs->add($job);
    }

    public function __construct()
    {
        $this->jobs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add jobs
     *
     * @param Xaav\QueueBundle\Entity\Job $jobs
     */
    public function addJobs(\Xaav\QueueBundle\Entity\Job $jobs)
    {
        $this->jobs[] = $jobs;
    }

    /**
     * Get jobs
     *
     * @return Doctrine\Common\Collections\Collection $jobs
     */
    public function getJobs()
    {
        return $this->jobs;
    }
}