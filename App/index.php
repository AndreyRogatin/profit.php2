<?php

use App\Models\Article;
use App\Models\Product;

require __DIR__ . '/autoload.php';

$product = new Product;
$product->name = 'iPhone9';
$product->price = 35000;
$product->weight = 130;
$product->insert();
var_dump($product);


$news = Article::getLastArticles(3);

include __DIR__ . '/templates/index.php';