<?php

use App\Models\Article;
use App\View;

require __DIR__ . '/autoload.php';

$view = new View;
$view->news = Article::getLastArticles(3);
$view->foo = 'bar';

var_dump(count($view));
//var_dump($view);

foreach ($view as $key => $value) {
    var_dump($key, $value);
    echo '<hr>';
}
$view->display(__DIR__ . '/App/templates/index.php');