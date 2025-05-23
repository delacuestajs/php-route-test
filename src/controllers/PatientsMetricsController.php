<?php

namespace Practice\controllers;

class PatientsMetricsController
{
    public static function __callStatic($method, $args)
    {
        echo json_encode([
            'method name' => $method,
            'arguments' => $args,
        ], JSON_PRETTY_PRINT);
    }
}
