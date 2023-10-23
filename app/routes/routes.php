<?php
namespace app\routes;

class Routes
{
    public static function get()
    {
        return [
            'get' => [
                '/' => 'HomeController@index',
                '/register' => 'RegisterController@store',
                '/user/[0-9]+' => 'UserController@edit',
                '/product/[a-z]+/category/[a-z]+' => 'ProductController@show'
            ],
            'post' => []
        ];
    }
}