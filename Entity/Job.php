<?php

namespace Xaav\QueueBundle\Entity;

use Xaav\QueueBundle\JobQueue\JobCallableInterface;

/**
 * @orm:Entity
 */
class Job
{
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
     */
     protected $id;

    /**
     * @orm:Column(type="string", length="1000")
     */
    protected $callable;

    /**
     * @orm:ManyToOne(targetEntity="JobQueue", inversedBy="Job")
     */
    protected $jobQueue;

    public function execute()
    {
        $callable = unserialize($this->callable);

        if($callable instanceof JobCallableInterface) {
            $callable->call();
        }
        else {
            throw new \InvalidArgumentException(gettype($callable).' does not implement JobCallableInterface');
        }
    }
}
