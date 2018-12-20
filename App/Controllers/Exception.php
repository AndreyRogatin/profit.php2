<?php

namespace App\Controllers;


class Exception extends Controller
{

    protected $ex;
    protected $title = 'Произошла ошибка!';

    public function __construct($ex)
    {
        parent::__construct();
        $this->ex = $ex;
    }

    public function handle()
    {
        $this->view->ex = $this->ex;
        $this->view->title = $this->title;
        $this->view->display(__DIR__ . '/../templates/errors.php');
    }
}