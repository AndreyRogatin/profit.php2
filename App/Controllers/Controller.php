<?php

namespace App\Controllers;


use App\View;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View;
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