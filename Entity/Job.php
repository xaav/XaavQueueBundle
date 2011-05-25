<?php

namespace Xaav\QueueBundle\Entity;

use Xaav\QueueBundle\JobQueue\JobCallableInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Job
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

    public function executeJob()
    {
        $callable = unserialize($this->callable);

        if($callable instanceof JobCallableInterface) {
            $callable->call();
        }
        else {
            throw new \InvalidArgumentException(gettype($callable).' does not implement JobCallableInterface');
        }
    }

    public function setJobCallable(JobCallableInterface $callable)
    {
        $this->callable = serialize($callable);
    }
}
