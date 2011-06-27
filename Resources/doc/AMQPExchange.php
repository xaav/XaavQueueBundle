<?php

class AMQPExchange {

    public function bind ( string $queue_name , string $routing_key );

    function __construct ( AMQPConnection $connection , string $exchange_name = ""  );

    public function declare ( string $exchange_name = "" , string $exchange_type = AMQP_EX_TYPE_DIRECT , int $flags = 0  );

    public function delete ( string $exchange_name = NULL , int $params = 0  );

    public function publish ( string $message , string $routing_key , int $params = 0 , array $attributes  );
}