<?php

namespace Xaav\QueueBundle\Entity;

/**
 * @orm:Entity
 * @orm:Table(name="table")
 */
class JobQueue
{
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
     */
     protected $id;

     /**
      * @orm:OneToMany(targetEntity="Job", mappedBy="JobQueue")
      */
     protected $jobs;

    public function getJob()
    {
        $job = $this->jobs->last();
        $this->jobs->removeElement($job);

        return $job;
    }

    public function addJob(Job $job)
    {
        $this->jobs->add($job);
    }
}