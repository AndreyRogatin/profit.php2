<?php

namespace App\Models;


class Author extends Model
{
    protected static $table = 'authors';

    public $name;

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