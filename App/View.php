<?php

namespace App;


class View implements \Countable, \Iterator
{
    protected $data = [];
    protected $pos = 0;
    protected $keys = [];

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * @deprecated
     */
    public function assign(string $name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param string $template
     */
    public function display(string $template)
    {
        echo $this->render($template);
    }

    /**
     * @param string $template
     * @return false|string
     */
    public function render(string $template)
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include $template;
        $res = ob_get_contents();
        ob_end_clean();
        return $res;
    }

    /**
     * @return int Количество эелментов в массиве data
     */
    public function count()
    {
        return \count($this->data);
    }

    /**
     * Return the current element
     */
    public function current()
    {
        return $this->data[$this->keys[$this->pos]];
    }

    /**
     * Move forward to next element
     */
    public function next()
    {
        ++$this->pos;
    }

    /**
     * Return the key of the current element
     */
    public function key()
    {
        return $this->pos;
    }

    /**
     * Checks if current position is valid
     */
    public function valid()
    {
        return isset($this->keys[$this->pos]);
    }

    /**
     * Rewind the Iterator to the first element
     */
    public function rewind()
    {
        $this->pos = 0;
        $this->keys = array_keys($this->data);
    }
}