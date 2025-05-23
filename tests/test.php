<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Practice\Route;

/*
* Route manual entry can be added here...
* Route::resource('patients.metrics', 'post', ['patient' => 1, 'metrics' => 2], ['name' => 'John Doe']);
*/

Route::handleRequest();
