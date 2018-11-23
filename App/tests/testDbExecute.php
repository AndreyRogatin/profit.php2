<?php

require __DIR__ . '/../autoload.php';

$db = new \App\Db();

$sql1 = 'INSERT INTO users (login, email, password) 
         VALUES (:login, :email, :password)';

$sql2 = 'UPDATE users
         SET email=:email
         WHERE login=:login';

$sql3 = 'DELETE FROM users
         WHERE login=:login';

$sql4 = 'INSERT INTO sers (login, email, password) 
         VALUES (:login, :email, :password)';

$sql5 = 'UPDATE sers
         SET email=:email
         WHERE login=:login';

$sql6 = 'DELETE FROM sers
         WHERE login=:login';

$data1 = [
    ':login' => 'Kolya',
    ':email' => 'kolya@mail.ru',
    ':password' => '54321'
];

$data2 = [
    ':email' => 'kolya@yandex.ru',
    ':login' => 'Kolya'
];

$data3 = [
    ':login' => 'Kolya'
];


assert(true === $db->execute($sql1, $data1));
assert(true === $db->execute($sql2, $data2));
assert(true === $db->execute($sql3, $data3));
assert(false === $db->execute($sql4, $data1));
assert(false === $db->execute($sql5, $data2));
assert(false === $db->execute($sql6, $data3));