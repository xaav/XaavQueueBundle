<?php

namespace Xaav\QueueBundle\JobQueue\Provider;

use Xaav\QueueBundle\JobQueue\JobQueue\FlatFileJobQueue;

class FlatFileProvider implements JobQueueProviderInterface
{
    protected $directory;

    public function __construct($directory)
    {
        $this->directory = $directory;
    }

    public function getJobQueueByName($name)
    {
        return new FlatFileJobQueue($this->directory.'/'.$name.'.jobqueue');
    }
}