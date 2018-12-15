<?php

namespace App\Controllers;


class CreateArticle extends Controller
{

    public function handle()
    {
        $this->view->display(__DIR__ . '/../templates/createArticle.php');
    }
}