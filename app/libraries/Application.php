<?php

namespace app\libraries;

class Application {

    public Router $router;
    public Request $request;
    public Response $response;

    public function __construct() 
    {
        $this->request = new Request;
        $this->router = new Router($this->request);   
    }

    public function run() {
        $this->router->resolve();
    }
}