<?php

namespace App\Controllers;


use App\Models\Article as ArticleModel;

class DeleteArticle extends Controller
{

    public function handle()
    {
        if (!empty($_GET['id'])) {
            $article = ArticleModel::findById($_GET['id']);
            $article->delete();
        }

        header('Location: /AdminPanel');
    }
}