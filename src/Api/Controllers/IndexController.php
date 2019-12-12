<?php

namespace App\Api\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    private $request;
    private $response;

    public function index(Request $request)
    {
        $this->request = $request;

        $this->checkForValidJson();

        $content = json_decode($request->getContent());
        if (is_array($content)) {
            $rpcRequestsArray = [];
            foreach ($content as $requestObjectData) {
                array_push($rpcRequestsArray, new \App\Api\Requests\RpcRequest($requestObjectData));
            }
        } elseif (is_object($content)) {
            $requestObject = $content;
        }

        return new Response(
            $request->getContent(),
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
    }

    private function getJson() {
        if (0 === strpos($this->request->headers->get('Content-Type'), 'application/json')) {
            $data = json_decode($this->request->getContent());
            $this->request->request->replace(is_array($data) ? $data : []);
        }
    }

    private function checkForValidJson()
    {
        $content = $this->request->getContent();
        json_decode($content);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $exception = new \App\Exceptions\JsonParseException();
            throw $exception;
        }
    }

    private function call($requestObjectData)
    {
        $rpcRequest = new \App\Api\Requests\RpcRequest($requestObjectData);
        $rpcRequest->handle();
        return $rpcRequest->result;
    }
}