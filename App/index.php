<?php

use App\Models\Article;
use App\Models\User;

require __DIR__ . '/autoload.php';

$user = User::findById(2);
$user->email = 'vasya@yandex.ru';
$user->update();


$news = Article::getLastArticles(3);

include __DIR__ . '/templates/index.php';