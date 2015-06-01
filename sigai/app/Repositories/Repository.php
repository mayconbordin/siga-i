<?php namespace App\Repositories;

class Repository {

    protected static function get(&$var, $default=null)
    {
        return isset($var) ? $var : $default;
    }
    
}
