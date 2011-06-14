<?php

namespace Xaav\QueueBundle\JobQueue;

interface JobInterface
{
    public function __construct(JobCallableInterface $callable = null);

    public function execute();

}