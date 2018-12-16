<?php

require __DIR__ . '/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$uriParts = explode('/', $uri);

if ('App' === $uriParts[1]) {
    $action = array_pop($uriParts);
    array_shift($uriParts);
    $class = implode('\\', $uriParts);
} else {
    $class = '\App\Controllers\Index';
    $action = 'action';
}

$ctrl = new $class;
$ctrl->$action();