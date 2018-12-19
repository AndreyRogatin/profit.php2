<?php

namespace App;


class MultiException extends \Exception
{
    protected $errors = [];

    public function add(\Exception $ex)
    {
        $this->errors[] = $ex;
    }

    public function getAll()
    {
        return $this->errors;
    }

    public function isEmpty()
    {
        return empty($this->errors);
    }
}