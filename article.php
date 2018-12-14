<?php

use App\Models\Article;
use App\View;

require __DIR__ . '/autoload.php';

$view = new View;
$view->article = Article::findById(abs((int)$_GET['id']));
$view->display(__DIR__ . '/App/templates/article.php');