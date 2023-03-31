<?php

namespace Framework\Http;

use Framework\View;
use Laminas\Diactoros\Response;

class Controller
{
    protected $response;

    protected $view;

    public function __construct()
    {
        $this->response = new Response();
        $this->view = View::init();
    }
}