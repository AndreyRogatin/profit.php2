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

        return $res[0] ?? false;
    }

    public static function findAll()
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql, [], static::class);
    }

    public function update()
    {
        $vars = get_object_vars($this);

        $sets = [];
        $data = [];
        foreach ($vars as $key => $value) {
            $data[':' . $key] = $value;
            if ('id' == $key) {
                continue;
            }
            $sets[] = $key . '=:' . $key;
        }

        var_dump($data);
        var_dump($sets);

        $db = new Db;
        $sql = 'UPDATE ' . static::$table . ' 
                SET ' . implode(', ', $sets) . ' 
                WHERE id=:id';
        return $db->execute($sql, $data);
    }
}