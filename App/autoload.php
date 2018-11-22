<?php

function __autoload($name)
{
    require __DIR__ . '/../' . str_replace('\\', '/', $name) . '.php';
}