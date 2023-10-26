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
                // '/product/[a-z]+/category/[a-z]+' => 'ProductController@show',
                '/newad' => 'NewAd@show',
                '/myads' => 'MyAds@show',
                '/profilesettings' => 'ProfileSettings@show',
                '/accountsettings' => 'AccountSettings@show',
                '/ad/[0-9]+' => 'AdSolo@show',
                '/delete/[0-9]+' => 'AdSolo@delete',
                '/edit/[0-9]+' => 'AdSolo@edit',
                '/chat' => 'ChatController@show'
            ],
            'post' => [
                '/login' => 'NewLogin@get',
                '/register' => 'RegisterController@store',
                '/emailsend' => 'ResetPassword@reset',
                '/setnewpass' => 'NewPassword@set',
                '/newad' => 'NewAd@set',
                '/profilesettings' => 'ProfileSettings@set',
                '/accountsettings' => 'AccountSettings@set',
                '/edit/[0-9]+' => 'AdSolo@set'
                ]
        ];
    }
}