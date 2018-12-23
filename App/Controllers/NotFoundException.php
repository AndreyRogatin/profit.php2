<?php

namespace App\Controllers;


class NotFoundException extends Exception
{
    protected $title = 'Ошибка 404 - не найдено';

    public function handle(){
        parent::handle();
        $this->logger->warning($this->ex->getMessage(), ['time' => time()]);
    }
}