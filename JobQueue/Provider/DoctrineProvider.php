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

            $queue = new JobQueue();
            $queue->setName($name);

            $this->entityManager->persist($queue);

            return $queue;
        }
    }

    public function __destruct()
    {
        try {
            $this->entityManager->flush();
        }
        catch (\Exception $ex)
        {
            //Throwing an exception will cause bad things!
        }
    }
}
