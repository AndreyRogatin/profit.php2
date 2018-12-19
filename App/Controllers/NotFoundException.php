<?php

namespace App\Controllers;


class NotFoundException extends Exception
{
    protected $title = 'Ошибка 404 - не найдено';
}