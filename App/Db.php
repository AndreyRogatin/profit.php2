<?php

namespace App;


class Db
{
    protected $dbh;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=php2';
        $this->dbh =  new \PDO($dsn, 'root', '');
    }

    public function query(string $sql, array $data, string $class = '')
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);

        if (empty($class)) {
            return $data;
        }

        $res = [];

        foreach ($data as $item) {

            $obj = new $class;

            foreach ($item as $key => $value) {
                $obj->$key = $value;
            }

            $res[] = $obj;
        }
        return $res;
    }
}