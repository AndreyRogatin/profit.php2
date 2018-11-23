<?php

namespace App\Models;


class User extends Model
{
    protected static $table = 'users';
    public $login;
    public $email;
    public $password;
}