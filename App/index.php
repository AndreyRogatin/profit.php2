<?php

use App\Models\Article;
use App\Models\Product;

require __DIR__ . '/autoload.php';

$product = new Product;
$product->name = 'iPhone7';
$product->price = 32000;
$product->weight = 120;
$product->save();
var_dump($product);


$news = Article::getLastArticles(3);

include __DIR__ . '/templates/index.php';