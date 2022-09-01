<?php

namespace App\Helpers;

class Response
{
    const VIEWS_PATH = __DIR__ . '/../../views/';
    const ERROR_VIEWS_PATH = __DIR__ . '/../../views/codes/';

    public static function json($data)
    {
        $response = [];
        header("Content-Type: application/json");
        echo json_encode($data);
        die();
    }

    public static function jsonOK()
    {
        header("Content-Type: application/json");
        echo json_encode(['status' => 'ok']);
        die();
    }

    public static function jsonError()
    {
        header("Content-Type: application/json");
        echo json_encode(['status' => 'error']);
        die();
    }


    /**
     * @param string $page
     * @param array $data
     */
    public static function page(string $page, array $data = [])
    {
        $page = sprintf("%s%s.view.php", self::VIEWS_PATH, $page);
            include $page;
    }
    /**
     * @param string $page
     * @param array $data
     */
    public static function errorPage(string $page, array $data = [])
    {
        $page = sprintf("%s%s.view.php", self::ERROR_VIEWS_PATH, $page);
        include $page;
    }


    public static function redirect($page)
    {
        header("Location: $page");
        exit();
    }
}