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

        return redirect('staff/staffs');
    }
   
   
        public function index()
    {
        // スタッフ一覧をidの降順で取得
        $staffs = Staff::orderBy('last_name_hiragana')->paginate(100);

        // スタッフ一覧ビューでそれを表示
        return view('staff.auth.staffs_index', [
            'staffs' => $staffs,
        ]);
    }
    
    
//スタッフアカウント編集    
public function edit($id)
{
    $staff = Staff::findOrFail($id);

    return view('staff.auth.staff_edit', [
        'staff' => $staff,
    ]);
}

// スタッフアカウント情報の「更新処理」
public function update(Request $request, $id)
{
    $staff = Staff::findOrFail($id);
    
    $staff->last_name = $request->last_name;
    $staff->first_name = $request->first_name;
    $staff->last_name_hiragana = $request->last_name_hiragana;
    $staff->first_name_hiragana = $request->first_name_hiragana;
    $staff->email = $request->email;
    $staff->save();

    return redirect('staff/staffs');
/*
メールアドレスが他の人と重複している場合エラーが出てしまうのでそれを処理する必要ありバリデーションを使用？
*/
}


// スタッフアカウントの削除
public function destroy($id)
{

    $staff = Staff::findOrFail($id);

    $staff->delete();

    return redirect('staff/staffs');
}

    
}
