<?php

namespace App\Models;

use App\Db;
use App\MultiException;
use App\NotFoundException;

/**
 * Class Model Базовая модель
 * @package App\Models
 */
abstract class Model
{
    protected static $table = '';
    public $id;

    /**
     * @param array $data
     * @throws MultiException
     */
    public function fill(array $data)
    {
        $errors = new MultiException();

        if (is_int($data['id'])) {
            $this->id = $data['id'];
        } else {
            $errors->add(new \Exception('В поле id передано не число'));
        }

        if (is_string($data['table'])) {
            static::$table = $data['table'];
        } else {
            $errors->add(new \Exception('В поле table передана не строка'));
        }

        if (!$errors->empty()) {
            throw $errors;
        }
    }

    /**
     * Ищет запись таблицы с заданным id
     * @param $id int
     * @return object|bool
     * @throws NotFoundException
     * @throws \App\DbExeption
     */
    public static function findById($id)
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $res = $db->query($sql, [':id' => $id], static::class);

        if (empty($res[0])) {
            throw new NotFoundException('Ресурс не найден', 4);
        } else {
            return $res[0];
        }

    }

    /**
     * Ищет все записи таблицы
     * @return array
     * @throws NotFoundException
     * @throws \App\DbExeption
     */
    public static function findAll()
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::$table;
        $res = [];

        foreach ($db->queryEach($sql, [], static::class) as $row) {
            $res[] = $row;
        }

        if (empty($res)) {
            throw new NotFoundException('Ресурс не найден', 5);
        } else {
            return $res;
        }
    }

    /**
     * Вставляет новую запись в таблицу
     */
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
            ' (' . implode(', ', $fields) . ') ' .
            'VALUES (' . implode(', ', array_keys($data)) . ')';

        $db->execute($sql, $data);
        $this->id = $db->getLastInsertId();
    }

    /**
     * Обновляет запись в таблице
     */
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

    /**
     * Сохраняет, либо обновляет запись в таблице
     */
    public function save()
    {
        (isset($this->id)) ? $this->update() : $this->insert();
    }

    /**
     * Удаляет запись из таблицы
     */
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