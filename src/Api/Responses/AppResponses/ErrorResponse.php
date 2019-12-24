<?php


namespace App\Api\Responses\AppResponses;


class ErrorResponse extends Response
{
    public function __construct(int $status = 200, array $headers = [], bool $json = false)
    {
        parent::__construct($status, $headers, $json);
        $this->contentObject->error = new \stdClass();
        $this->contentObject->id = null;
        $this->setContent(json_encode($this->contentObject));
    }
}