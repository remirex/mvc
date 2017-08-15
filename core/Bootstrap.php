<?php

class Bootrstrap
{
    private $controller;
    private $method;
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
        // check controller
        if ($this->request['controller'] == '') {
            $this->controller = 'home';
        } else {
            $this->controller = $this->request['controller'];
        }
        // check method
        if ($this->request['method'] == '') {
            $this->method = 'index';
        } else {
            $this->method = $this->request['method'];
        }
    }

    public function createController()
    {
        if(class_exists($this->controller)) {
            $parents = class_parents($this->controller);
            if(in_array('Controller', $parents)){
                if(method_exists($this->controller, $this->method)){
                    return new $this->controller($this->method, $this->request);
                }
                else {
                    echo 'Method does not exist';
                    return;
                }
            }
            else {
                echo 'Base controller does not exist';
                return;
            }
        }
        else {
            echo 'Controller class does not exist';
            return;
        }
    }
}