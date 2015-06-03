<?php

class ExceptionHandler
{
    private $exception; //The exception that will be handled.
    private $httpCode; //The http response status code;
    private $clientMessage; //The error message the client will receive.
    private $devMode; //Defines if the server is running in development mode.

    public function __construct($devMode)
    {
        $this->devMode = $devMode;
    }

    /**
     * Handles the given exception differently depending on whether development mode is on or not.
     *
     * @param $ex Exception			        The exception to be handled.
     *
     */
    public function handleException($ex)
    {
        ob_end_clean(); //Remove all accumulated output in the buffer.
        //Set the exception to be handled and indicate that an exception is encountered.
        $this->exception = $ex;

        $handleAPI = false;
        if(is_a($ex, "CoreException"))
        {
            $routeObject = $ex->getRouteObject();
            if(isset($routeObject))
            {
                $handleAPI = $routeObject->isAPICall;
            }
        }

        $this->setClientResponse(); //Prepare the client error response message.
        $this->logError(); //The error is logged to php server log.
        $this->notifyAdmin(); //The configured e-mail address is notified of the error.
        $this->sendResponse($handleAPI);
    }

    private function sendResponse($handleAPI)
    {
        if(!$handleAPI)
        {
            if($this->devMode)
            {
                var_dump($this->exception);
            }
            else
            {
                //The client is redirected to the configured error page.
                $_SESSION['msg'] = $this->clientMessage;
                $_SESSION['code'] = $this->httpCode;

                header('Location: ' . ROOT_PATH . SEPARATOR . ERROR_ROUTE);
                exit;
            }
        }

        http_response_code($this->httpCode);
        exit($this->httpCode);
    }

    /**
     * Logs the handled exception to the server log.
     */
    private function logError()
    {
        $message = "Client: " . $_SERVER['REMOTE_ADDR'] . " has caused the following exception to occur:\n" . $this->exception->__toString();
        error_log($message, 0);
    }

    /**
     * Emails the configured email address a notification about the occured exception.
     */
    private function notifyAdmin()
    {
        //TODO: Implement this function!
    }

    /**
     * Checks the handled exception for it's HTTP status code and sets a appropriate message for the client.
     */
    private function setClientResponse()
    {
        $code = $this->exception->getCode();

        switch ($code)
        {
            case 400:
                $this->httpCode = 400;
                $this->clientMessage = "Actie niet geaccepteerd door server, check actie parameters.";
                return;
            case 401:
                $this->httpCode = 401;
                $this->clientMessage = "U bent niet bevoegd om deze actie uit te voeren.";
                return;
            case 403:
                $this->httpCode = 403;
                $this->clientMessage = "Deze actie is verboden.";
                return;
            case 404:
                $this->httpCode = 404;
                $this->clientMessage = "De aangevraagde gegevens konden niet gevonden worden.";
                return;
            case 405:
                $this->httpCode = 405;
                $this->clientMessage = "HTTP request method wordt niet ondersteund op deze actie.";
                return;
            default:
                $this->httpCode = 500;
                $this->clientMessage = "Interne server fout. Probeer opnieuw of neem contact op met de beheerder.";
                return;
        }
    }
}