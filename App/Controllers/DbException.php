<?php

namespace App\Controllers;


class DbException extends Exception
{
    protected $title = 'Произошла ошибка при работе с базой данных!';
}