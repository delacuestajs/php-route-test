<?php

namespace Excercise\controllers;

class PatientsMetricsController
{
    public static function index()
    {
        echo "<pre>";
        echo "PatientsMetricsController index method called\n";
        echo "</pre>";
    }

    public static function show($id)
    {
        echo "<pre>";
        echo "PatientsMetricsController show method called with ID: $id\n";
        echo "</pre>";
    }
}
