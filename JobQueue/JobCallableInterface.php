<?php
namespace Xaav\QueueBundle\JobQueue;

interface JobCallableInterface
{
    /**
     * Processes the callable
     */
    function call();
}