<?php namespace App\Exceptions;

class MissingEnvironmentVariableException extends \Exception
{

    public function __construct($variable, $code = 0, Exception $previous = null)
    {
        $message = "The variable {$variable} is missing from the environment variables";

        parent::__construct($message, $code, $previous);
    }

}