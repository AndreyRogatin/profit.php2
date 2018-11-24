<?php

use App\Models\Person;
use App\Models\User;
use App\Models\Article;

require __DIR__ . '/autoload.php';

$news = Article::getLastArticles(3);

include __DIR__ . '/templates/index.php';