<?php

class ConnectionContext
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $port;

    /**
     * @param $host String        The host where the database is located.
     * @param $username String    The username that must be used to access the database.
     * @param $password String    The password used to authenticate the user.
     * @param $database String    The database name.
     * @param $port String        The port that should be connected to.
     */
    public function __construct($host, $username, $password, $database, $port)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->port = $port;
    }


    /**
     * @return mysqli       PHP standard mysqli object to connect to defined database.
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