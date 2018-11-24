<?php

namespace App\Models;

use App\Db;

abstract class Model
{
    protected static $table = '';
    public $id;

    public static function findById($id)
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $res = $db->query($sql, [':id' => $id], static::class);

        if (empty($res)) {
            return false;
        } else {
            return $res[0];
        }
    }

    public static function findAll()
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql, [], static::class);
    }
}