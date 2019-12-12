<?php


namespace App\Api\Requests;


class RpcRequest
{
    public $jsonrpc;
    public $method;
    public $params;
    public $id;

    function __construct(\StdClass $rpcRequestdData)
    {
        $this->jsonrpc = $rpcRequestdData->jsonrpc;
        $this->method = $rpcRequestdData->method;
        $this->params = $rpcRequestdData->params;
        $this->id = $rpcRequestdData->id;
    }
}