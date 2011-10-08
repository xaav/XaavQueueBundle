<?php

namespace Xaav\QueueBundle\JobQueue\Provider;

use Doctrine\ORM\EntityManager;
use Xaav\QueueBundle\Entity\JobQueue;

class DoctrineProvider implements JobQueueProviderInterface
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getJobQueueByName($name)
    {
        $queue = $this->entityManager
                       ->getRepository('XaavQueueBundle:JobQueue')
                       ->findOneByName($name);

        if(!$queue) {

            $queue = new JobQueue();
            $queue->setName($name);

            $this->entityManager->persist($queue);
        }

        $queue->setEntityManager($this->entityManager);

        return $queue;
    }
}
