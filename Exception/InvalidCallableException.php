<?php

namespace Xaav\QueueBundle\Exception;

class InvalidCallableException extends \RuntimeException
{
    public function __construct($callable)
    {
        parent::construct(sprintf('"%s" does not implement the job callable interface', $callable));
    }
}