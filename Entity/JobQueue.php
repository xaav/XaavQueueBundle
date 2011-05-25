<?php

namespace Xaav\QueueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class JobQueue
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