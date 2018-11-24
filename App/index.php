<?php

use App\Models\Person;
use App\Models\User;
use App\Models\Article;

require __DIR__ . '/autoload.php';

$news = Article::getLastArticles(2);

var_dump($news);