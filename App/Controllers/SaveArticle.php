<?php

namespace App\Controllers;


use App\Models\Author;
use App\Models\Article as ArticleModel;

class SaveArticle extends Controller
{

    public function handle()
    {
        if (!empty($_POST)) {

            $author = Author::findByName($_POST['source']);
            if (!isset($author)) {
                $author = new Author;
                $author->name = $_POST['source'];
                $author->save();
            }

            $article = new ArticleModel;
            $article->title = $_POST['title'];
            $article->body = $_POST['body'];
            $article->author = $author;
            $article->id = $_POST['id'] ?? null;
            $article->save();
        }

        header('Location: /App/Controllers/AdminPanel/action');
    }
}