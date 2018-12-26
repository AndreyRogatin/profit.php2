<?php

namespace App;


class AdminDataTable
{
    protected $models = [];
    protected $funcs = [];

    public function __construct(array $models, array $funcs)
    {
        $this->models = $models;
        $this->funcs = $funcs;
    }

    public function render()
    {
        $res = '<table>';
        foreach ($this->models as $model) {
            $res .= '<tr>';
            foreach ($this->funcs as $func) {
                $res .= '<td>';
                $res .= $func($model);
                $res .= '</td>';
            }
            $res .= '</tr>';
        }
        $res .= '</table>';
        return $res;
    }
}