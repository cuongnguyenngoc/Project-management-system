<?php

class App {

    protected $controller = 'home';
    protected $method = 'index';
    protected $param = array();

    function __construct() {
        $url = $this->parseUrl();
        if (file_exists('app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        $this->param = $url ? array_values($url) : array(); //Neu $url có 2 phần ở trên là $url[0] $url[1] bị unset roi nhưng
        //van con thua nua thì gán mấy giá trị đó vào param còn nếu không thì gán cho param một mảng rỗng.
        //print_r($this->param);
        call_user_func_array(array($this->controller, $this->method), $this->param);
    }

    function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var($url = rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

}
