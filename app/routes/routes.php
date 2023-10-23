<?php
namespace app\routes;

class Routes
{
    public static function get()
    {
        return [
            'get' => [
                '/' => 'HomeController@index',
                '/logout' => 'LogoutController@execute',
                '/user' => 'UserController@show',
                '/user/[0-9]+' => 'UserController@edit',
                '/product/[a-z]+/category/[a-z]+' => 'ProductController@show',
                '/resetpass' => 'ResetPassword@show',
                '/setnewpass' => 'NewPassword@show'
            ],
            'post' => [
                '/login' => 'NewLogin@show',
                '/register' => 'RegisterController@store',
                '/emailsend' => 'ResetPassword@reset',
                '/setnewpass' => 'NewPassword@set'
                ]
        ];
    }
}