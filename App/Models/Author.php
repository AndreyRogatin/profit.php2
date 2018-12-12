<?php

namespace App\Models;

/**
 * Class Author Модель Автора
 * @package App\Models
 */
class Author extends Model
{
    protected static $table = 'authors';

    public $name;

    /**
     * Ищет запись таблицы с заданным именем
     * @param $name
     * @return object|null
     */
    public static function findByName($name)
    {
        $authors = static::findAll();
        foreach ($authors as $author) {
            if ($name === $author->name) {
                return $author;
            }
        }
        return null;
    }
}