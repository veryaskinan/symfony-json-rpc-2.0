<?php


namespace App\Responses;


final class ErrorJsonParseResponse extends ErrorResponse
{
    public function __construct(int $status = 200, array $headers = [], bool $json = false)
    {
        parent::__construct($status, $headers, $json);
        $this->contentObject->error->code = -32700;
        $this->contentObject->error->message = "Parse error";
        $this->setContent(json_encode($this->contentObject));
    }
}