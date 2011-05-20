<?php

namespace Xaav\QueueBundle\Entity;

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
        $callable->call();
    }
}
