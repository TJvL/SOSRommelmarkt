<?php

class PHPError extends Exception
{
    private $context;

    public function getContext()
    {
        return $this->context;
    }

    public function __construct($code, $message, $file, $line, $context = null)
    {
        parent::__construct($message, $code);

        $this->file = $file;
        $this->line = $line;
        $this->context = $context;
    }
}