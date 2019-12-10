<?php

namespace App\Exceptions;

class JsonParseException extends \Exception
{
    protected $code = -32700;
    protected $message = "Parse error";
}