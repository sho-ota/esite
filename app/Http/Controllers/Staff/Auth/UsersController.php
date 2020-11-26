<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; //追加

class UsersController extends Controller
{
     
    protected function create()
    {
         $user = new User;
        
        // 利用者作成ビューを表示
        return view('staff.auth.ussers_create', [
            'user' => $user,
        ]);
    }
    
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'last_name'           => 'required|string|max:255',
            'first_name'          => 'required|string|max:255',
            'last_name_hiragana'  => 'required|string|max:255',
            'first_name_hiragana' => 'required|string|max:255',
            'email'               => 'required|string|email|max:255|unique:users',
            'password'            => 'required|string|min:8|confirmed',
        ]);
        
        
        $user = new User;
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->last_name_hiragana = $request->last_name_hiragana;
        $user->first_name_hiragana = $request->first_name_hiragana;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // 前のURLへリダイレクトさせる
        return back();
    }
    
    
    public function index()
    {
        // 利用者一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);

        // 利用者一覧ビューでそれを表示
        return view('staff.auth.users_index', [
            'users' => $users,
        ]);
    }
}
