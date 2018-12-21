<?php

require __DIR__ . '/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

if (!empty($_GET)) {
    $uri = substr($uri, 0, strpos($uri, '?') - 1);
}

$uriParts = explode('/', $uri);

if ('App' === $uriParts[1]) {
    $action = array_pop($uriParts);
    array_shift($uriParts);
    $class = implode('\\', $uriParts);
} else {
    $class = '\App\Controllers\Index';
    $action = 'action';
}

try {
    $ctrl = new $class;
    $ctrl->$action();
} catch (\App\NotFoundException $ex) {
    (new \App\Logger())->warning($ex->getMessage(), ['time' => time()]);
    $ctrl = new \App\Controllers\NotFoundException($ex);
    $ctrl->action();
} catch (\App\DbExeption $ex) {
    (new \App\Logger())->critical($ex->getMessage(), ['time' => time()]);
    $ctrl = new \App\Controllers\DbException($ex);
    $ctrl->action();
}
