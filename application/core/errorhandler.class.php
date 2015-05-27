<?php

class ErrorHandler
{
    private $exception; //The exception that will be handled.
    private $routeObject; //The route object used when the exception occurred.
    private $exceptionEncountered; //Boolean that determines if an exception is encountered.
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
     * @param $routeObject RouteObject      The route information used when the exception was thrown, can be null.
     *
     */
    public function handleException($ex, $routeObject)
    {
        //Set the exception to be handled and indicate that an exception is encountered.
        $this->exception = $ex;
        $this->routeObject = $routeObject;
        $this->exceptionEncountered = true;

        if($routeObject->isAPICall)
        {
            $this->handleAsAPI();
        }
        else
        {
            $this->handleAsStandard();
        }
    }

    private function handleAsAPI()
    {
        if($this->devMode) //If development mode is active handle the error differently.
        {
            $this->logError(); //The error is logged to php server log.
            $this->outputDevError(); //The error is displayed with all exception information available to the client.
        }
        else //Else handle it normally.
        {
            $this->setClientResponse(); //Prepare the client error response message.
            $this->logError(); //The error is logged to php server log.
            $this->notifyAdmin(); //The configured e-mail address is notified of the error.
            $this->outputError();
        }
    }

    private function handleAsStandard()
    {
        if($this->devMode) //If development mode is active handle the error differently.
        {
            $this->logError(); //The error is logged to php server log.
            $this->outputDevError(); //The error is displayed with all exception information available to the client.
        }
        else //Else handle it normally.
        {
            $this->setClientResponse(); //Prepare the client error response message.
            $this->logError(); //The error is logged to php server log.
            $this->notifyAdmin(); //The configured e-mail address is notified of the error.
            $this->redirectToErrorPage(); //The client is redirected to the configured error page.
        }
    }

    /**
     * Dumps the contents of the exception object to the client.
     */
    private function outputDevError()
    {
        header('Content-Type: application/json');
        exit(json_encode($this->exception));
    }

    /**
     * Gives the client a notice of the occurred error in JSON.
     */
    private function outputError()
    {
        header('Content-Type: application/json');
        exit(json_encode($this->clientMessage));
    }

    /**
     * Checks the handled exception for it's HTTP status code and sets a appropriate message for the client.
     */
    private function setClientResponse()
    {
        $code = $this->exception->getCode();
        if(isset($code)) //If the code was set then proceed to search the appropriate message for it.
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
        else //Else put the code on 500 BadRequest.
        {
            http_response_code(500);
            $this->httpCode = 500;
            $this->clientMessage = "Interne server fout. Probeer opnieuw of neem contact op met de beheerder.";
        }
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
     * Redirects the client to the configured standard error page.
     * Sets the $_SESSION array so next request the client sees some minor details about this exception.
     */
    private function redirectToErrorPage()
    {
        $_SESSION['msg'] = $this->clientMessage;
        $_SESSION['code'] = $this->httpCode;

        header('Location: ' . ROOT_PATH . SEPARATOR . ERROR_ROUTE);
        exit("Redirecting...");
    }
}