<?php

require __DIR__ . '/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$uriParts = explode('/', $uri);

if (!empty($uriParts[1])) {
    $ctrlClass = ucfirst($uriParts[1]);
} else {
    $ctrlClass = 'Index';
}

$class = '\App\Controllers\\' . $ctrlClass;

$ctrl = new $class;
$ctrl->action();