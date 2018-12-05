<?php

namespace App;


class Config
{
    public $data;
    private static $instance;

    private function __construct()
    {
        $this->data = include __DIR__ . '/conf.php';
    }

    public static function getInstance()
    {
        if (empty(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}