<?php

namespace App\Models;


/**
 * Class User Модель Пользователя
 * @package App\Models
 */
class User extends Model
{
    protected static $table = 'users';
    public $login;
    public $email;
    public $password;
}