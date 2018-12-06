<?php

use App\Models\Article;
use App\View;

require __DIR__ . '/autoload.php';

$view = new View;
$view->assign('news', Article::getLastArticles(3));

$view->display(__DIR__ . '/App/templates/index.php');