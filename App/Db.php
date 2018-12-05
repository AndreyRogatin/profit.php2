<?php

namespace App;


class Db
{
    protected $dbh;

    public function __construct()
    {
        $conf = Config::getInstance();
        $data = $conf->data['db'];
        $dsn = 'mysql:host=' . $data['host'] . ';dbname=' . $data['dbname'];
        $this->dbh = new \PDO($dsn, $data['login'], $data['pass']);
    }

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

    public function query(string $sql, array $data, string $class = '')
    {
        $sth = $this->dbh->prepare($sql);

        foreach ($data as $key => $value) {
            $sth->bindValue($key, $value, $this->getParam($value));
        }

        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute(string $sql, array $data)
    {
        $sth = $this->dbh->prepare($sql);

        foreach ($data as $key => $value) {
            $sth->bindValue($key, $value, $this->getParam($value));
        }

        return $sth->execute();
    }
}