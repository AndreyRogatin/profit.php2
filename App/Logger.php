<?php

namespace App;


class Logger
{
    protected static $path = __DIR__ . '/log.txt';

    public static function log(\Exception $ex)
    {
        $fh = fopen(static::$path, 'a');
        $str = time() . '|' . $ex->getFile() . '|' . $ex->getMessage() . PHP_EOL;
        fwrite($fh, $str);
        fclose($fh);
    }
}