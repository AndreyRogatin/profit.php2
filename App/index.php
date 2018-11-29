<?php

use App\Models\Article;
use App\Config;

require __DIR__ . '/autoload.php';

$conf = new Config;
var_dump($conf->data['db']['host']);

$news = Article::getLastArticles(3);

include __DIR__ . '/templates/index.php';