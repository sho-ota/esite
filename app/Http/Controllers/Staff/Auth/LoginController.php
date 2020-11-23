<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; //追加
use Illuminate\Support\Facades\Auth; //追加

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:staff')->except('logout');
    }
    
    
    
    protected function guard()
    {
        return Auth::guard('staff');
    }

    public function showLoginForm()
    {
        return view('staff.auth.login');
    }

    public function logout(Request $request)
    {
        Auth::guard('staff')->logout();

        return $this->loggedOut($request);
    }

    public function loggedOut(Request $request)
    {
        return redirect(route('staff.login'));
    }
    
}
