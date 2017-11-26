<?php 

namespace App\Core;

class Request
{
    /**
     * Fetch the request URI
     * 
     * @return string
     */
    public static function uri()
    {
        return '/' . $_GET['page'];
    }

    /**
     * Fetch the request method.
     *
     * @return string
     */
    public static function method() 
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}