<?php


namespace App\Api\Responses;


use \Symfony\Component\HttpFoundation\JsonResponse;


class Response extends JsonResponse
{
    protected $contentObject;

    public function __construct(int $status = 200, array $headers = [], bool $json = false)
    {
        parent::__construct(null, $status, $headers, $json);
        $this->contentObject = new \StdClass();
        $this->contentObject->jsonrpc = "2.0";
        $this->setContent(json_encode($this->contentObject));
        $this->setStatusCode(JsonResponse::HTTP_OK);
    }
}