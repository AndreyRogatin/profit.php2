<?php

require __DIR__ . '/autoload.php';

if (!empty($_GET['ctrl'])) {
    $ctrlClass = $_GET['ctrl'];
} else {
    $ctrlClass = 'Index';
}

$class = '\App\Controllers\\' . $ctrlClass;

$ctrl = new $class;
$ctrl->action();