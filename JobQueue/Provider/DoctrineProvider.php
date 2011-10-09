<?php

namespace Xaav\QueueBundle\JobQueue\Provider;

use Doctrine\ORM\EntityManager;
use Xaav\QueueBundle\Entity\JobQueue;

class DoctrineProvider implements JobQueueProviderInterface
{
    protected $entityManager;

	public function __construct(array $options)
	{
		$container = $options['service_container'];
		$this->entityManager = $container->get('doctrine')->getEntityManager();
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
