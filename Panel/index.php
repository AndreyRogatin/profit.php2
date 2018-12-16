<?php

require __DIR__ . '/../autoload.php';

if (!empty($_GET['ctrl'])) {
    $ctrlClass = $_GET['ctrl'];
} else {
    $ctrlClass = 'Panel';
}

if (!empty($_GET['act'])) {
    $action = $_GET['act'];
} else {
    $action = 'action';
}

$class = '\App\Controllers\\' . $ctrlClass;

$ctrl = new $class;
$ctrl->$action();