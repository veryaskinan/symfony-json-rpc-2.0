<?php


namespace App\Api\Responses\AppResponses;


class SuccessResponse extends Response
{
    public function __construct(int $status = 200, array $headers = [], bool $json = false)
    {
        parent::__construct($status, $headers, $json);
        $this->contentObject->result = new \stdClass();
        $this->contentObject->id = null;
        $this->setContent(json_encode($this->contentObject));
    }
}