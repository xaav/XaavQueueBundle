<?php

namespace Xaav\QueueBundle\JobQueue\Provider;

use Xaav\QueueBundle\Entity\JobQueue;

class DoctrineProvider implements JobQueueProviderInterface
{
    protected $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getJobQueueByName($name)
    {
        $result = $this->entityManager
                       ->getRepository('XaavQueueBundle:JobQueue')
                       ->findOneByName($name);

        if($result) {

            return $result;
        }
        else {

            return new JobQueue();
        }
    }
}
