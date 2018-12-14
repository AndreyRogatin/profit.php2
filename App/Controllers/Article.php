<?php

namespace App\Controllers;


use App\Models\Article as ArticleModel;

class Article extends Controller
{
    public function access()
    {
        return true;
    }

    public function handle()
    {
        $this->view->article = ArticleModel::findById(abs((int)$_GET['id']));
        $this->view->display(__DIR__ . '/../templates/article.php');
    }
}