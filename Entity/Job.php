<?php

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
}
