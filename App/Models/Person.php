<?php

namespace App\Models;


/**
 * Class Person Модель Человека
 * @package App\Models
 */
class Person extends Model
{
    protected static $table = 'persons';
    public $firstName;
    public $lastName;
    public $age;
}