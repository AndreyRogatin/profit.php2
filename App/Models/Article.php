<?php

namespace App\Models;


use App\Db;

class Article extends Model
{
    protected static $table = 'news';

    public $title;
    public $body;
    public $source;

    public static function getLastArticles(int $lim)
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT :lim';
        $data = [':lim' => $lim];
        return $db->query($sql, $data, static::class);
    }
}