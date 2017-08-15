<?php

class Controller
{
    protected $method;
    protected $request;

    public function __construct($method, $request)
    {
        $this->method = $method;
        $this->request = $request;
    }

    public function executeMethod()
    {
        return $this->{$this->method}();
    }
    protected function returnView($viewmodel, $fullview)
    {
        $view = 'views/'.get_class($this).'/'.$this->method.'.php';
        if($fullview) {
            require 'views/main.php';
        } else {
            require ($view);
        }
    }
}