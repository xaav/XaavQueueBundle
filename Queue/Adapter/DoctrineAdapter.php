<?php

namespace Xaav\QueueBundle\Queue\Adapter;

use Xaav\QueueBundle\Entity\Queue;

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

            $queue = new Queue();
            $queue->setName($name);

            $this->entityManager->persist($queue);
        }

        $queue->setEntityManager($this->entityManager);

        return $queue;
    }
}
