<?php

class ConnectionContext
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $port;

    public function __construct($host, $username, $password, $database, $port)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->port = $port;
    }

    /**
     * Makes a connection to the database and returns it.
     *
     * @return A mysqli object with a valid connection to the database.
     */
    public function connect()
    {
        // Throw exceptions on error.
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        // Connect to the database
        $connection = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port);

        // Return the connection.
        return $connection;
    }
}