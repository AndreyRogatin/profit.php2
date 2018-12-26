<?php

namespace App\Controllers;


use App\AdminDataTable;
use App\Models\Article;

class Panel extends Controller
{
    protected $funcs = [];
    protected $articles = [];

    public function __construct()
    {
        parent::__construct();
        $this->funcs = include __DIR__ . '/../funcs.php';
        $this->articles = Article::findAll();
    }

    public function handle()
    {
        $this->view->table = (new AdminDataTable($this->articles, $this->funcs))->render();
        $this->view->display(__DIR__ . '/../templates/panel.php');
    }
}