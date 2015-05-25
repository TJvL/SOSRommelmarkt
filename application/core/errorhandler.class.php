<?php

class ErrorHandler
{
    private $exception;
    private $exceptionEncountered;
    private $httpCode;
    private $clientMessage;

    public function handleException($ex)
    {
        $this->exception = $ex;
        $this->exceptionEncountered = true;

        if(DEV_RULES)
        {
            $this->logError();
            $this->outputError();
        }
        else
        {
            $this->setClientResponse();
            $this->logError();
            $this->notifyAdmin();
            $this->redirectToErrorPage();
        }
    }

    private function outputError()
    {
        var_dump($this->exception);
        die();
    }

    private function setClientResponse()
    {
        $code = $this->exception->getCode();
        if(isset($code))
        {
            http_response_code($code);
            $this->httpCode = $code;

            switch ($code)
            {
                case 400:
                    $this->clientMessage = "Actie niet geaccepteerd door server, check actie parameters.";
                    return;
                case 401:
                    $this->clientMessage = "U bent niet bevoegd om deze actie uit te voeren.";
                    return;
                case 403:
                    $this->clientMessage = "Deze actie is verboden.";
                    return;
                case 404:
                    $this->clientMessage = "De aangevraagde gegevens konden niet gevonden worden.";
                    return;
                case 405:
                    $this->clientMessage = "HTTP request method wordt niet ondersteund op deze actie.";
                    return;
                case 500:
                    $this->clientMessage = "Interne server fout. Probeer opnieuw of neem contact op met de beheerder.";
                    return;
            }
        }
        else
        {
            http_response_code(500);
            $this->httpCode = 500;
            $this->clientMessage = "Interne server fout. Probeer opnieuw of neem contact op met de beheerder.";
        }
    }

    private function logError()
    {
        $message = "Client: " . $_SERVER['REMOTE_ADDR'] . " has caused the following exception to occur:\n" . $this->exception->__toString();
        error_log($message, 0);
    }

    private function notifyAdmin()
    {

    }

    private function redirectToErrorPage()
    {
        $_SESSION['msg'] = $this->clientMessage;
        $_SESSION['code'] = $this->httpCode;

        header('Location: ' . ROOT_PATH . SEPARATOR . ERROR_ROUTE);
        exit("Redirecting...");
    }
}