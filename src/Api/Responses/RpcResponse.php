<?php


namespace App\Api\Responses;

use App\Api\Router;

class RpcResponse
{
    public
        $jsonrpc,
        $result,
        $error,
        $id
    ;

    function __construct($jsonrpc, $result = null, $error = null, $id = null)
    {
        $this->jsonrpc = $jsonrpc;
        $this->result = $result;
        $this->error = $error;
        $this->id = $id;
    }
}
