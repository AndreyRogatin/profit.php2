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

    protected function getLastId()
    {
        $db = new Db;
        $sql = 'SELECT id FROM ' . static::$table .
               ' ORDER BY id DESC LIMIT 1';
        $res = ($db->query($sql, [], static::class));
        return (int)$res[0]->id;
    }

    public function insert()
    {
        $vars = get_object_vars($this);
        $fields = [];
        $data = [];

        foreach ($vars as $key => $value) {

            if ('id' == $key) {
                continue;
            }
            $data[':' . $key] = $value;
            $fields[] = $key;
        }

        $db = new Db;

        $sql = 'INSERT INTO ' . static::$table .
               ' (' . implode(', ', $fields) . ') '  .
               'VALUES (' . implode(', ', array_keys($data)) . ')';

        $db->execute($sql, $data);
        $this->id = $this->getLastId();
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

        $db = new Db;
        $sql = 'UPDATE ' . static::$table .
               ' SET ' . implode(', ', $sets) .
               ' WHERE id=:id';
        $db->execute($sql, $data);
    }

    public function save()
    {
        (isset($this->id)) ? $this->update() : $this->insert();
    }

    public function delete()
    {
        if (isset($this->id)) {
            $db = new Db;
            $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
            $data = [':id' => $this->id];
            $db->execute($sql, $data);
        }
        foreach ($this as $key => $value) {
            $this->$key = null;
        }
    }
}