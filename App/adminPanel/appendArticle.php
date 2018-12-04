<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

if (!empty($_POST)) {
    $artilce = new Article;
    $artilce->title = $_POST['title'];
    $artilce->body = $_POST['body'];
    $artilce->source = $_POST['source'];
    $artilce->save();
}

header('Location: /App/adminPanel/');