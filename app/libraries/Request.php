<?php

namespace app\libraries;

class Request {
    
    public function getPath()
    {
        $url = $_SERVER["REQUEST_URI"] ?? "/";
        $position = strpos($url,"?");
        if ($position === false) {
            return $url;
        }

        return substr($url,0,$position);
    }

    public function getMethod()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function getBody() 
    {
        $method = $this->getMethod();
        $body = [];
        if ($method === "get") {
            foreach($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }

        if ($method === "post") {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}