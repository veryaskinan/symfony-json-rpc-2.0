<?php


namespace App\Requests;


class HttpRequest
{
    public $body;

    function __construct($body)
    {
        $this->body = $body;
    }
}