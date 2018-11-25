<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';

$article = Article::findById(abs((int)$_GET['id']));

include __DIR__ . '/templates/article.php';