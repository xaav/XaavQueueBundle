<?php

namespace Xaav\QueueBundle\Entity;

use Xaav\QueueBundle\JobQueue\JobInterface;
use Xaav\QueueBundle\Exception\InvalidCallableException;
use Xaav\QueueBundle\JobQueue\JobCallableInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Xaav\QueueBundle\Entity\JobRepository")
 */
class Job implements JobInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length="1000")
     */
    protected $callable;

    /**
     * @ORM\ManyToOne(targetEntity="JobQueue", inversedBy="Job")
     */
    protected $jobQueue;

    public function __construct(JobCallableInterface $callable = null)
    {
        if ($callable){

            $this->callable = serialize($callable);
        }
    }

    public function execute()
    {
        $callable = unserialize($this->callable);

        if($callable instanceof JobCallableInterface){
            $callable->call();
        }
        else {
            throw new InvalidCallableException($callable);
        }
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
     * Set callable
     *
     * @param string $callable
     */
    public function setCallable($callable)
    {
        $this->callable = $callable;
    }

    /**
     * Get callable
     *
     * @return string $callable
     */
    public function getCallable()
    {
        return $this->callable;
    }

    /**
     * Set jobQueue
     *
     * @param Xaav\QueueBundle\Entity\JobQueue $jobQueue
     */
    public function setJobQueue(\Xaav\QueueBundle\Entity\JobQueue $jobQueue)
    {
        $this->jobQueue = $jobQueue;
    }

    /**
     * Get jobQueue
     *
     * @return Xaav\QueueBundle\Entity\JobQueue $jobQueue
     */
    public function getJobQueue()
    {
        return $this->jobQueue;
    }
}