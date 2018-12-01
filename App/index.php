<?php

use App\Models\Article;
use App\Models\Product;

require __DIR__ . '/autoload.php';

$product = Product::findById(24);
$product->delete();
var_dump($product);


$news = Article::getLastArticles(3);

include __DIR__ . '/templates/index.php';