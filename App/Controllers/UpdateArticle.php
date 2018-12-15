<?php

namespace App\Controllers;


class UpdateArticle extends Controller
{
    public function handle()
    {
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../templates/updateArticle.php');
    }
}