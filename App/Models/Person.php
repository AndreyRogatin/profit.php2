<?php

namespace App\Models;


class Person extends Model
{
    protected static $table = 'persons';
    public $firstName;
    public $lastName;
    public $age;
}