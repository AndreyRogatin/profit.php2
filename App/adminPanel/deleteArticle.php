<?php

use App\Models\Article;

require __DIR__ . '/../../autoload.php';

if (!empty($_GET['id'])) {
    $article = Article::findById(abs((int)$_GET['id']));
    $article->delete();
}

header('Location: /App/adminPanel/');