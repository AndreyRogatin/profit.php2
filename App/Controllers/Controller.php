<?php

namespace App\Controllers;


use App\View;

abstract class Controller
{
    protected $view;
    protected $twig;

    public function __construct()
    {
        $this->view = new View;
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../templates/');
        $this->twig = new \Twig_Environment($loader);
    }

    public function access()
    {
        return true;
    }

    public function action()
    {
        if ($this->access()) {
            $this->handle();
        } else {
            echo 'Нет доступа';
        }

    }

    abstract public function handle();
}