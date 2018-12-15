<?php

namespace App\Controllers;


class AdminPanel extends Controller
{

    public function handle()
    {
        $this->view->articles = \App\Models\Article::findAll();
        $this->view->display(__DIR__ . '/../templates/adminPanel.php');
    }
}