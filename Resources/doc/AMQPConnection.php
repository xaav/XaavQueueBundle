<?php

class AMQPConnection {

    /**
     * @return bool
     */
    public function connect();

    /**
     * @param array $credentials
     */
    public function __construct (array $credentials = array());

    public function disconnect ();

    public function isConnected ();

    public function reconnect ();

    /**
     * @param string $host
     */
    public function setHost ($host);

    /**
     * @param string $login
     */
    public function setLogin ($login);

    /**
     * @param string $password
     */
    public function setPassword ($password);

    /**
     * @param int $port
     */
    public function setPort ($port);

    /**
     * @param string $vhost
     */
    public function setVhost ($vhost);
}