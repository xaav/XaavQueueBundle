<?php

namespace Xaav\QueueBundle\JobQueue;

interface JobInterface
{
    public function execute();

    public function setCallable(JobCallableInterface $callable);
}