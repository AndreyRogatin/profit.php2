<?php

require __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function ($name) {
    require __DIR__ . '/' . str_replace('\\', '/', $name) . '.php';
});