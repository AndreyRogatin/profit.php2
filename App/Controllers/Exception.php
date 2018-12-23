<?php

namespace App\Controllers;


use App\Logger;

class Exception extends Controller
{

    protected $ex;
    protected $logger;
    protected $title = 'Произошла ошибка!';

    public function __construct(\Exception $ex)
    {
        parent::__construct();
        $this->ex = $ex;
        $this->logger = new Logger;
    }

    public function handle()
    {
        $this->view->ex = $this->ex;
        $this->view->title = $this->title;
        $this->view->display(__DIR__ . '/../templates/errors.php');
    }
}