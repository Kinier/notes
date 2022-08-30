<?php

namespace App\Router;


class Web
{


    private string $requestType;
    private string $requestPath;

    private bool $success;

    public function __construct()
    {
        $this->requestType = $_SERVER['REQUEST_METHOD'];
        $this->requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->success = false;

        if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
            $this->success = true;
        }

    }

    /**
     * @param $path
     * @param $controller
     * @param $method
     *
     */
    public function get($path, $controller, $method)
    {
        if ($this->requestType === 'GET' && $this->requestPath === $path) {
            $controller::$method();
            $this->success = true;
        }
    }


    /**
     * @param $path
     * @param $controller
     * @param $method
     */
    public function post($path, $controller, $method)
    {
        if ($this->requestType === 'POST' && $this->requestPath === $path) {
            $controller::$method();
            $this->success = true;
        }
    }


    public function delete($path, $controller, $method)
    {
        if ($this->requestType === 'DELETE' && $this->requestPath === $path) {
            $controller::$method();
            $this->success = true;
        }
    }

    /**
     *  call this function only AFTER registering all routes
     */
    public function done()
    {
        if ($this->success === false) {
            $this->sendCustomResponse();
        }
    }

    private function sendCustomResponse(string $header = 'Location: /nopage', string $code = '404')
    {
        header($header, true, $code);
        die();
    }
}