<?php

class RoleRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }
}