<?php

require __DIR__ . '/autoload.php';

$db = new \App\Db;

var_dump( $db->query('SELECT * FROM persons', [], '\App\Models\Person') );