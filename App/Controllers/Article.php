<?php

namespace App\Controllers;


use App\Models\Article as ArticleModel;

class Article extends Controller
{
    public function handle()
    {
        $this->twig->display('article.php', ['article' => ArticleModel::findById($_GET['id'])]);
    }
}