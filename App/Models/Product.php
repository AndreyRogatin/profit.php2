<?php

namespace App\Models;


/**
 * Class Product Модель Продукта
 * @package App\Models
 */
class Product extends Model
{
    protected static $table = 'products';

    public $name;
    public $price;
    public $weight;
}