<?php

use App\Models\Person;
use App\Models\User;

require __DIR__ . '/autoload.php';

$user = User::findById(1);

var_dump($user);