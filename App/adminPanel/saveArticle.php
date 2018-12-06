<?php

use App\Models\Article;

require __DIR__ . '/../../autoload.php';

if (!empty($_POST)) {
    $article = new Article;
    $article->title = $_POST['title'];
    $article->body = $_POST['body'];
    $article->source = $_POST['source'];
    $article->id = $_POST['id'] ?? null;
    $article->save();
}

header('Location: /App/adminPanel/');