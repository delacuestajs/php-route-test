<?php

namespace Practice;

class Route
{
    public static function resource(string $name, string $method = 'get', array $params = null, array $payload = null)
    {
        $controller = 'Practice\controllers\\' . str_replace(' ', '', ucwords(str_replace('.', ' ', $name))) . 'Controller';

        if (class_exists($controller)) {
            switch ($method) {
                case 'get':
                    if (isset($params['metrics'])) {
                        $controller::get($params['patient'], $params['metrics']);
                    } elseif (isset($params['patient'])) {
                        $controller::get($params['patient']);
                    } else {
                        $controller::index();
                    }
                    break;
                case 'post':
                    $action = 'create';
                    $controller::$action($payload);
                    break;
                case 'patch':
                    $action = 'update';
                    if (isset($params['metrics'])) {
                        $controller::$action($params['patient'], $params['metrics'], $payload);
                    } else {
                        $controller::$action($params['patient'], $payload);
                    }
                    break;
                case 'delete':
                    $action = 'delete';
                    if (isset($params['metrics'])) {
                        $controller::$action($params['patient'], $params['metrics']);
                    } else {
                        $controller::$action($params['patient']);
                    }
                    break;
                default:
                    http_response_code(405);
                    exit(json_encode(['error' => 'Method Not Allowed'], JSON_PRETTY_PRINT));
            }
        } else {
            http_response_code(404);
            exit(json_encode(['error' => 'Resource not Found (' . $name . ')'], JSON_PRETTY_PRINT));
        }
    }

    public static function handleRequest()
    {
        $request = self::requestProcess();
        self::resource($request['dot_path'], $request['method'], $request['ids'], $request['payload']);
    }

    private static function requestProcess()
    {
        $chunked_path = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        return [
            'method' => strtolower($_SERVER['REQUEST_METHOD']),
            'path' => $_SERVER['REQUEST_URI'],
            'dot_path' => count($chunked_path) > 2 ?
                $chunked_path[0] . '.' . $chunked_path[2] :
                $chunked_path[0],
            'ids' => count($chunked_path) > 3 ?
                ['patient' => $chunked_path[1], 'metrics' => $chunked_path[3]] : (count($chunked_path) > 1 ?
                    ['patient' => $chunked_path[1]] : null),
            'payload' => json_decode(file_get_contents('php://input'), true),
        ];
    }
}
