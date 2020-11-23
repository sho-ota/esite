<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route; //追加
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    
    protected $user_route  = 'user.login';
    protected $staff_route = 'staff.login';

    protected function redirectTo($request)
    {
        // ルーティングに応じて未ログイン時のリダイレクト先を振り分ける
        if (!$request->expectsJson()) {
            if (Route::is('user.*')) {
                return route($this->user_route);
            } elseif (Route::is('staff.*')) {
                return route($this->staff_route);
            }
        }
    }
    
    /*元データ
    protected function redirectTo($request)
    {
        
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
    */
}
