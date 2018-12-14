<?php

namespace App\Controllers;


use App\Models\Article;

class Index extends Controller
{
    public function handle()
    {
        $this->view->news = Article::getLastArticles(3);
        $this->view->display(__DIR__ . '/../templates/index.php');
    }
}