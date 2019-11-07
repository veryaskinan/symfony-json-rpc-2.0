<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function index()
    {
        return new Response(
            json_encode(['Hellow', 'World']),
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
    }
}