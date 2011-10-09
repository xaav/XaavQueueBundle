<?php

namespace Xaav\QueueBundle\Queue\Adapter;

use Xaav\QueueBundle\Entity\JobQueue;

class DoctrineAdapter implements QueueAdapterInterface
{
    protected $entityManager;

	public function __construct(array $options)
	{
		$container = $options['service_container'];
		$this->entityManager = $container->get('doctrine')->getEntityManager();
	}

    public function get($name)
    {
        $queue = $this->entityManager
                       ->getRepository('XaavQueueBundle:Queue')
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
