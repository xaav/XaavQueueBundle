<?php

namespace Xaav\QueueBundle\Entity;

use Xaav\QueueBundle\JobQueue\JobQueue\DoctrineJobQueue;
use Xaav\QueueBundle\JobQueue\JobQueue\JobQueueInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Xaav\QueueBundle\Entity\JobQueueRepository")
 */
class JobQueue extends DoctrineJobQueue implements JobQueueInterface
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