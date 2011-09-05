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

	public function setData($data)
	{
		$this->data = $data;
	}

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