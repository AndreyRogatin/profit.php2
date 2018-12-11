<?php

use App\Models\Article;
use App\Models\Author;

require __DIR__ . '/../../autoload.php';

if (!empty($_POST)) {

    $author = Author::findByName($_POST['source']);
    if (!isset($author)) {
        $author = new Author;
        $author->name = $_POST['source'];
        $author->save();
    }

    $article = new Article;
    $article->title = $_POST['title'];
    $article->body = $_POST['body'];
    $article->author = $author;
    $article->id = $_POST['id'] ?? null;
    $article->save();
}

header('Location: /App/adminPanel/');