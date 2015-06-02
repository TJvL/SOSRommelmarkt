<?php

abstract class APIController
{
    private $name;

    protected function __construct($name)
    {
        $this->name = $name;
    }

    protected function respondWithJSON($model)
    {
        header('Content-Type: application/json');
        exit(json_encode($model));
    }

    protected function respondOK()
    {
        ob_end_clean();
        http_response_code(200);
        exit(200);
    }
}