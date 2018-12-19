<?php

namespace App\Models;


use App\Db;
use App\NotFoundException;

/**
 * Class Article Модель статьи
 * @package App\Models
 */
class Article extends Model
{
    protected static $table = 'news';

    public $title;
    public $body;
    public $author_id;

    /**
     * Ищет запись таблицы author с заданным id
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
     * Устанавливает поле author_id
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if ('author' === $name) {
            $this->author_id = $value->id;
        }
    }

    /**
     * Возвращает limit последних записей из таблицы
     * @param int $limit
     * @return array
     */
    public static function getLastArticles(int $limit)
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::$table .
            ' ORDER BY id DESC LIMIT :limit';
        $data = [':limit' => $limit];
        $res = $db->query($sql, $data, static::class);
        if (empty($res)) {
            throw new NotFoundException('Ресурс не найден', 6);
        } else {
            return $res;
        }
    }
}