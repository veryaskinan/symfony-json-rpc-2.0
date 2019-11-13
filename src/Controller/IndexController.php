<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    private $request;

    public function index(Request $request)
    {
        $this->request = $request;

        $this->getJson();

        return new Response(
            $request->getContent(),
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
    }

    private function getJson() {
        if (0 === strpos($this->request->headers->get('Content-Type'), 'application/json')) {
            $data = json_decode($this->request->getContent(), true);
            $this->request->request->replace(is_array($data) ? $data : []);
        }
    }
}