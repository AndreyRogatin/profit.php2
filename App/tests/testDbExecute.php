<?php

require __DIR__ . '/../../autoload.php';

$db = new \App\Db();

$sql = [];

$sql['create'] = 'CREATE TABLE testDbExecute (id INT, name TEXT)';
$sql['insert'] = 'INSERT INTO testDbExecute (id, name) VALUES (:id, :name)';
$sql['update'] = 'UPDATE testDbExecute SET name=:name WHERE id=:id';
$sql['delete'] = 'DELETE FROM testDbExecute WHERE id=:id AND name=:name';
$sql['badInsert'] = 'INSERT INTO tetDbExecute (id, name) VALUES (:id, :name)';
$sql['badUpdate'] = 'UPDATE tetDbExecute SET name=:name WHERE id=:id';
$sql['badDelete'] = 'DELETE FROM tetDbExecute WHERE id=:id AND name=:name';
$sql['drop'] = 'DROP TABLE testDbExecute';

$data = ['id' => 1, ':name' => 'test'];

assert(true === $db->execute($sql['create'], $data) );
assert(true === $db->execute($sql['insert'], $data) );
assert(true === $db->execute($sql['update'], $data) );
assert(true === $db->execute($sql['delete'], $data) );
assert(false === $db->execute($sql['badInsert'], $data) );
assert(false === $db->execute($sql['badUpdate'], $data) );
assert(false === $db->execute($sql['badDelete'], $data) );
assert(true === $db->execute($sql['drop'], []) );