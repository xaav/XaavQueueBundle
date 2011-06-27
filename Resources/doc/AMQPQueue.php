<?php

class AMQPQueue {

    public function ack ( int $delivery_tag , int $flags = NULL  );

    public function bind ( string $exchange_name , string $routing_key );

    public function cancel ( string $consumer_tag = ""  );

    function __construct ( AMQPConnection $amqp_connection , string $queue_name = ""  );

    /**
     * @return array
     */
    public function consume ( array $options = array()  );

    /**
     * @return int
     */
    public function declare ( string $queue_name = "" , int $flags = AMQP_AUTODELETE  );

    public function delete ( string $queue_name );

    /**
     * @return array
     */
    public function get ( int $flags = AMQP_NOACK  );

    public function purge ( string $queue_name );

    public function unbind ( string $exchange_name , string $routing_key );
}