<?php

namespace Xaav\QueueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class SerializedJob
{
	/**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id;

	/**
	 * @ORM\Column(type="text")
	 */
	protected $data;

	/**
	 * @ORM\ManyToOne(targetEntity="Queue")
	 */
	protected $queue;

	/**
	 * Get Job Queue
	 */
	public function getQueue()
	{
		return $this->queue;
	}

	/**
	 * Set Job Queue
	 */
	public function setQueue(Queue $queue = null)
	{
		$this->queue = $queue;
	}

	/**
	 * Get Data
	 */
	public function setData($data)
	{
		$this->data = $data;
	}

	/**
	 * Set Data
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	* Get id
	*
	* @return integer $id
	*/
	public function getId()
	{
		return $this->id;
	}
}