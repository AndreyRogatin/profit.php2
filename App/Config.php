<?php

namespace App;


/**
 * Class Config Модель Конфигураций
 * @package App
 */
class Config
{
    public $data;
    private static $instance;

    /**
     * Config constructor. Полечает данные из файла с конфигурациями и сохраняет их
     */
    private function __construct()
    {
        $this->data = include __DIR__ . '/conf.php';
    }

    /**
     * Возвращает экземпляр класса Config
     * @return object
     */
    public static function getInstance()
    {
        if (empty(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}