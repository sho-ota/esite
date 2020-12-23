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

        return redirect('staff/users');
    }
    
    
    public function index()
    {
        // 利用者一覧をidの降順で取得
        $users = User::orderBy('last_name_hiragana')->paginate(100);

        // 利用者一覧ビューでそれを表示
        return view('staff.auth.users_index', [
            'users' => $users,
        ]);
    }
    

    //利用者アカウント編集    
    public function edit($id)
    {
        $user = User::findOrFail($id);
    
        return view('staff.auth.user_edit', [
            'user' => $user,
        ]);
    }
    
    // 利用者アカウント情報の「更新処理」
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->last_name_hiragana = $request->last_name_hiragana;
        $user->first_name_hiragana = $request->first_name_hiragana;
        $user->email = $request->email;
        $user->save();
    
        return redirect('staff/users');
/*
メールアドレスが他の人と重複している場合エラーが出てしまうのでそれを処理する必要ありバリデーションを使用？
*/
    }

    
    // 利用者アカウントの削除
    public function destroy($id)
    {

        $user = User::findOrFail($id);

        $user->delete();

        return redirect('staff/users');
    }
    
}
