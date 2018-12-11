<?php

namespace App\Models;


use App\Db;

class Article extends Model
{
    protected static $table = 'news';

    public $title;
    public $body;
    public $source;
    public $author_id;

    /**
     * @param string $name
     * @return object|null
     */
    public function __get(string $name)
    {
        if ('author' === $name && isset($this->author_id)) {
            $author = Author::findById($this->author_id);
            if (isset($author)) {
                return $author;
            }
        }
        return null;
    }

    /**
     * @param int $limit
     * @return array
     */
    public static function getLastArticles(int $limit)
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::$table .
            ' ORDER BY id DESC LIMIT :limit';
        $data = [':limit' => $limit];
        return $db->query($sql, $data, static::class);
    }
}