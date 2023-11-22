<?php

namespace App\Helpers;

class Response
{
    public const VIEWS_PATH = __DIR__ . '/../../views/';
    public const ERROR_VIEWS_PATH = __DIR__ . '/../../views/codes/';

    public static function json($data)
    {
        $response = [];
        header("Content-Type: application/json");
        echo json_encode($data);
        die();
    }

    public static function jsonOK($data = null)
    {
        header("Content-Type: application/json");
        echo json_encode(['status' => 'ok', 'data' => $data]);
        die();
    }

    public static function jsonError($name = "error", $value = "unknown")
    {
        header("Content-Type: application/json");
        $answer = [
            'status' => 'error',
            "error" => [
                'id' => $name,
                'value' => $value
            ]
        ];
        echo json_encode($answer);
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