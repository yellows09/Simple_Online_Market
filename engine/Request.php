<?php

namespace app\engine;



class Request
{
    protected $requestString;
    protected $controllerName;
    protected $actionName;

    protected $method;

    protected $params = []; //$_REQUEST

    public function __construct()
    {
        $this->parseRequest();
    }

    protected function parseRequest() {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];

        $url = explode('/', $this->requestString);
        var_dump($this->controllerName);
        $this->controllerName = $url[1];
        $this->actionName = $url[2] ?? null;

        $this->params = $_REQUEST;
    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }


}