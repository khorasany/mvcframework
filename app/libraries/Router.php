<?php

namespace app\libraries;

class Router {
    protected static array $routes = [];
    public Request $request;

    public function __construct(Request $request) 
    {
        $this->request = $request;
    }

    public static function get($path,$callback) 
    {
        self::setRoutes("get",$path,$callback);
    }

    public static function post($path,$callback) 
    {
        self::setRoutes("post",$path,$callback);
    }

    public function resolve() 
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = self::returnRoutes($method,$path) ?? false;
        echo "<pre>";
        var_dump($_SERVER);
        echo "</pre>";
        exit;
        if ($callback === false) {
            exit("route does not exist");
        }
        
        return call_user_func($callback);

    }

    public static function setRoutes($method,$path,$callback) 
    {
        self::$routes[$method][$path] = $callback;
    }

    public static function returnRoutes($method,$path)
    {
        return self::$routes[$method][$path];
    }
}