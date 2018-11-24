<?php

namespace App;


class Db
{
    protected $dbh;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=php2';
        $this->dbh = new \PDO($dsn, 'root', '');
    }

    protected function getParam($value)
    {
        switch (true) {
            case is_bool($value):
                $param = \PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $param = \PDO::PARAM_NULL;
                break;
            case is_int($value):
                $param = \PDO::PARAM_INT;
                break;
            case is_resource($value):
                $param = \PDO::PARAM_LOB;
                break;
            default:
                $param = \PDO::PARAM_STR;
        }
        return $param;
    }

    public function query(string $sql, array $data, string $class = '')
    {
        $sth = $this->dbh->prepare($sql);

        foreach ($data as $key => $value) {
            $sth->bindParam($key, $value, $this->getParam($value));
        }

        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute(string $sql, array $data)
    {
        $sth = $this->dbh->prepare($sql);

        foreach ($data as $key => $value) {
            $sth->bindParam($key, $value, $this->getParam($value));
        }

        $this->dbh->beginTransaction();
        $res = $sth->execute();
        $this->dbh->commit();
        return $res;
    }
}