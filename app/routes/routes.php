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
                '/resetpass' => 'ResetPassword@show',
                '/setnewpass' => 'NewPassword@show',
                '/user/[0-9]+' => 'UserController@edit',
                '/product/[a-z]+/category/[a-z]+' => 'ProductController@show',
                '/newad' => 'NewAd@show',
                '/myads' => 'MyAds@show',
                '/profilesettings' => 'ProfileSettings@show',
                '/accountsettings' => 'AccountSettings@show'
            ],
            'post' => [
                '/login' => 'NewLogin@get',
                '/register' => 'RegisterController@store',
                '/emailsend' => 'ResetPassword@reset',
                '/setnewpass' => 'NewPassword@set',
                '/newad' => 'NewAd@set',
                '/profilesettings' => 'ProfileSettings@set',
                '/accountsettings' => 'AccountSettings@set'
                ]
        ];
    }
}