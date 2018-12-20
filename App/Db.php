<?php

namespace App;


/**
 * Class Db Модель Базы Данных
 * @package App
 */
class Db
{
    protected $dbh;

    /**
     * Db constructor. Устанавливает соединение с базой данных и сохраняет его
     * @throws DbExeption
     */
    public function __construct()
    {
        $conf = Config::getInstance();
        $data = $conf->data['db'];
        $dsn = 'mysql:host=' . $data['host'] . ';dbname=' . $data['dbname'];
        try {
            $this->dbh = new \PDO($dsn, $data['login'], $data['pass']);
        } catch (\PDOException $e) {
            throw new DbExeption('Database connection error: ' . $e->getMessage(), 1);
        }
    }

    /**
     * Возвращает константу PDO в зависимости от типы данных value
     * @param $value
     * @return int
     */
    protected function getParam($value)
    {
        switch (true) {
            case is_bool($value):
                return \PDO::PARAM_BOOL;
            case is_null($value):
                return \PDO::PARAM_NULL;
            case is_int($value):
                return \PDO::PARAM_INT;
            default:
                return \PDO::PARAM_STR;
        }
    }

    /**
     * Отправляет запрос к базе данных и возвращает массив с результатом выборки
     * @param string $sql
     * @param array $data
     * @param string $class
     * @return array
     * @throws DbExeption
     */
    public function query(string $sql, array $data, string $class = '')
    {
        $sth = $this->dbh->prepare($sql);

        foreach ($data as $key => $value) {
            $sth->bindValue($key, $value, $this->getParam($value));
        }

        $res = $sth->execute();
        if (!$res) {
            throw new DbExeption('Database query exception: ' . $sql, 2);
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    /**
     * Отправляет запрос к базе данных
     * @param string $sql
     * @param array $data
     * @return bool
     * @throws DbExeption
     */
    public function execute(string $sql, array $data)
    {
        $sth = $this->dbh->prepare($sql);

        foreach ($data as $key => $value) {
            $sth->bindValue($key, $value, $this->getParam($value));
        }

        $res = $sth->execute();
        if (!$res) {
            throw new DbExeption('Database execute exception: ' . $sql, 3);
        }
        return $res;
    }

    /**
     * Возвращает id последней записи вставленной в БД
     * @return int
     */
    public function getLastInsertId()
    {
        return (int)$this->dbh->lastInsertId();
    }
}