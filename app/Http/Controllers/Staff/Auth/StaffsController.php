<?php


namespace App\Http\Controllers\Staff\Auth;

use App\Models\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; //追加


class StaffsController extends Controller
{
   protected function create()
    {
         $staff = new Staff;
        
        // 利用者作成ビューを表示
        return view('staff.auth.staffs_create', [
            'staff' => $staff,
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
        
        
        $staff = new Staff;
        $staff->last_name = $request->last_name;
        $staff->first_name = $request->first_name;
        $staff->last_name_hiragana = $request->last_name_hiragana;
        $staff->first_name_hiragana = $request->first_name_hiragana;
        $staff->email = $request->email;
        $staff->password = bcrypt($request->password);
        $staff->save();

        // 前のURLへリダイレクトさせる
        return back();
    }
   
   
        public function index()
    {
        // スタッフ一覧をidの降順で取得
        $staffs = Staff::orderBy('id', 'desc')->paginate(10);

        // スタッフ一覧ビューでそれを表示
        return view('staff.auth.staffs_index', [
            'staffs' => $staffs,
        ]);
    }
}
