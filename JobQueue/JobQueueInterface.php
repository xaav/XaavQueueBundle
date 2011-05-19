<?php

namespace Xaav\QueueBundle\JobQueue;

interface JobQueueInterface
{
    public function getNextJob();

    public function queueJob();
}