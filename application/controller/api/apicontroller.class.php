<?php

class APIController
{
    private $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    protected function respondWithJSON($model)
    {
        header('Content-Type: application/json');
        exit(json_encode($model));
    }
}