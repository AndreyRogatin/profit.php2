<?php

namespace App\Controllers;


class NotFoundException extends Controller
{
    protected $title = 'Ошибка 404 - не найдено';

    public function __construct($ex)
    {
        parent::__construct();
        $this->ex = $ex;
    }

    public function handle()
    {
        $this->view->title = $this->title;
        $this->view->display(__DIR__ . '/../templates/errors.php');
    }
}