<?php

namespace App\Router;



class Web
{


    private string $requestType;
    private string $requestPath;

    private bool $isRouteFound;

    public function __construct()
    {
        $this->requestType = $_SERVER['REQUEST_METHOD'];
        $this->requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->isRouteFound = false;

        if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
            $this->isRouteFound = true;
        }

    }

    /**
     * @param $path
     * @param $controller
     * @param $method
     *
     */
    public function get($path, $controller, $method, $middleware = null)
    {
        if ($this->requestType === 'GET' && $this->requestPath === $path) {
            if ($middleware) call_user_func($middleware['middlewareFunction'], $middleware['arg']);


            $controller::$method();
            $this->isRouteFound = true;
        }
    }


    /**
     * @param $path
     * @param $controller
     * @param $method
     */
    public function post($path, $controller, $method, $middleware = null)
    {
        if ($this->requestType === 'POST' && $this->requestPath === $path) {
            if ($middleware) call_user_func($middleware['middlewareFunction'], $middleware['arg']);

            $controller::$method();
            $this->isRouteFound = true;
        }
    }


    public function delete($path, $controller, $method, $middleware = null)
    {
        if ($this->requestType === 'DELETE' && $this->requestPath === $path) {
            if ($middleware) call_user_func($middleware['middlewareFunction'], $middleware['arg']);


            $controller::$method();
            $this->isRouteFound = true;
        }
    }

    /**
     *  call this function only AFTER registering all routes
     */
    public function done()
    {

        if ($this->isRouteFound === false) {
            $this->sendCustomResponse();
        }
    }

    private function sendCustomResponse(string $header = 'Location: /nopage', string $code = '404')
    {
        var_dump($header);
        header($header);
        die();
    }
}