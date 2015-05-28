<?php
//Prevent default behaviour.
ini_set( "display_errors", "off" );
ini_set( "log_errors", "off" );

//Call this function when a exception goes uncatched by the application code.
function handleException($exception)
{
    $errorHandler = new ExceptionHandler(DEV_RULES);
    $errorHandler->handleException($exception);
}
set_exception_handler("handleException");

//Call this when ANY php error is encountered. And convert the error into an appropriate exception.
function handleError($err_severity, $err_msg, $err_file, $err_line)
{
    // error was suppressed with the @-operator
    if (0 === error_reporting()) { return false;}
    $exception = new ErrorException ($err_msg, 0, $err_severity, $err_file, $err_line);
    switch($err_severity)
    {
        case E_WARNING:
            $exception = new WarningException ($err_msg, 0, $err_severity, $err_file, $err_line);
            break;
        case E_PARSE:
            $exception = new ParseException ($err_msg, 0, $err_severity, $err_file, $err_line);
            break;
        case E_NOTICE:
            $exception = new NoticeException ($err_msg, 0, $err_severity, $err_file, $err_line);
            break;
        case E_CORE_ERROR:
            $exception = new CoreErrorException ($err_msg, 0, $err_severity, $err_file, $err_line);
            break;
        case E_CORE_WARNING:
            $exception = new CoreWarningException ($err_msg, 0, $err_severity, $err_file, $err_line);
            break;
        case E_COMPILE_ERROR:
            $exception = new CompileErrorException ($err_msg, 0, $err_severity, $err_file, $err_line);
            break;
        case E_COMPILE_WARNING:
            $exception = new CoreWarningException ($err_msg, 0, $err_severity, $err_file, $err_line);
            break;
        case E_USER_ERROR:
            $exception = new UserErrorException ($err_msg, 0, $err_severity, $err_file, $err_line);
            break;
        case E_USER_WARNING:
            $exception = new UserWarningException ($err_msg, 0, $err_severity, $err_file, $err_line);
            break;
        case E_USER_NOTICE:
            $exception = new UserNoticeException ($err_msg, 0, $err_severity, $err_file, $err_line);
            break;
        case E_STRICT:
            $exception = new StrictException ($err_msg, 0, $err_severity, $err_file, $err_line);
            break;
        case E_RECOVERABLE_ERROR:
            $exception = new RecoverableErrorException ($err_msg, 0, $err_severity, $err_file, $err_line);
            break;
        case E_DEPRECATED:
            $exception = new DeprecatedException ($err_msg, 0, $err_severity, $err_file, $err_line);
            break;
        case E_USER_DEPRECATED:
            $exception = new UserDeprecatedException ($err_msg, 0, $err_severity, $err_file, $err_line);
            break;
    }
    handleException($exception);
    return false;
}
set_error_handler("handleError");

//When a php error of level E_ERROR is encountered php always shuts down.
//A workaround for this is to add a shutdown function that still redirects the error to our custom error handler.
function checkForFatalError()
{
    $error = error_get_last();
    if($error["type"] == E_ERROR)
    {
        handleError($error["type"], $error["message"], $error["file"], $error["line"], "fatal");
    }
}
register_shutdown_function("checkForFatalError");

//Exception classes for PHP errors.
class WarningException extends ErrorException {}
class ParseException extends ErrorException {}
class NoticeException extends ErrorException {}
class CoreErrorException extends ErrorException {}
class CoreWarningException extends ErrorException {}
class CompileErrorException extends ErrorException {}
class CompileWarningException extends ErrorException {}
class UserErrorException extends ErrorException {}
class UserWarningException extends ErrorException {}
class UserNoticeException extends ErrorException {}
class StrictException extends ErrorException {}
class RecoverableErrorException extends ErrorException {}
class DeprecatedException extends ErrorException {}
class UserDeprecatedException extends ErrorException {}