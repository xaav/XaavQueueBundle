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
        if($jobs = base64_decode(unserialize($this->jobs))) {

            return $jobs;
        } else {

            return array();
        }
    }

    protected function setJobs($jobs)
    {
        $this->jobs = base64_encode(serialize($jobs));
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