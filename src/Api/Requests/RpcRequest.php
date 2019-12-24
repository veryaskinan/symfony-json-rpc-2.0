<?php


namespace App\Api\Requests;

use App\Api\Router;

class RpcRequest
{
    public
        $jsonrpc,
        $method,
        $params,
        $id
    ;

    private
        $router,
        $error
    ;

    function __construct(\StdClass $rpcRequestdData, Router $router)
    {
        $this->jsonrpc = $rpcRequestdData->jsonrpc;
        $this->method = $rpcRequestdData->method;
        $this->params = $rpcRequestdData->params;
        $this->id = $rpcRequestdData->id;
        $this->router = $router;
    }

    function call()
    {
        $route = $this->router->getRoute($this->method);
        return call_user_func("{$route->className}::{$route->methodName}");
    }

    function getError()
    {
        return $this->error;
    }
}
