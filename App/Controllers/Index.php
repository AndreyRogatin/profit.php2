<?php

namespace App\Controllers;


use App\Models\Article;

class Index extends Controller
{
    public function handle()
    {
        $this->twig->display('index.php', ['news' => Article::getLastArticles(3)]);
    }
}