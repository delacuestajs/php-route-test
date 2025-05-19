<?php

namespace Practice\controllers;

class PatientsController
{
    public static function index()
    {
        echo "<pre>";
        echo "PatientsController index method called\n";
        echo "</pre>";
    }

    public static function show($id)
    {
        echo "<pre>";
        echo "PatientsController show method called with ID: $id\n";
        echo "</pre>";
    }
}
