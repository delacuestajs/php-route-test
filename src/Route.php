<?php

namespace Practice;

class Route
{

    public static function handleRequest()
    {
        echo "<pre>";
        echo "Request method: " . $_SERVER['REQUEST_METHOD'] . "\n";
        echo "Request URI: " . $_SERVER['REQUEST_URI'] . "\n";
        echo "Request URI: " . self::urltProcess() . "\n";
        echo "</pre>";
    }

    private static function urltProcess()
    {
        return json_encode(explode('/', $_SERVER['REQUEST_URI']));
    }
}
