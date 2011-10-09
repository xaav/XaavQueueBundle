<?php

namespace Xaav\QueueBundle\Queue\Adapter;

use Xaav\QueueBundle\FlatFile\Queue;

class FlatFileProvider implements QueueAdapterInterface
{
	protected $source;

	public function __construct(array $options)
	{
		$this->source = $options['source'];
	}

	public function get($name)
	{
		return new Queue($this->source.'/'.$name.'.jobqueue');
	}
}