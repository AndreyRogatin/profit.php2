<?php

namespace App;


class View
{
    protected $data = [];

    public function assign(string $name, $value)
    {
        $this->data[$name] = $value;
    }

    public function display(string $template)
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }

        include $template;
    }
}