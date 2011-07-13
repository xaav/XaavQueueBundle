<?php

namespace Xaav\QueueBundle\JobQueue\Provider;

use Xaav\QueueBundle\FlatFile\JobQueue;

class FlatFileProvider implements JobQueueProviderInterface
{
    protected $directory;

    public function __construct($directory)
    {
        $this->directory = $directory;
    }

    public function getJobQueueByName($name)
    {
        return new JobQueue($name.'/'.$name.'.jobqueue');
    }
}