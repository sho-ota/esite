<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function show()
    {
        // idの値でメッセージを検索して取得
        $attendance = Attendance::findOrFail(1);

        // メッセージ詳細ビューでそれを表示
        return view('user.auth.home', [
            'attendance' => $attendance,
        ]);
    }
    
    
    public function update(Request $request,$id)
    {
        
        // バリデーション
        $request->validate([
            'select' => 'required|max:1',
            //'comment' => 'required|max:255',
        ]);
        
        // idの値でメッセージを検索して取得
        $attendance = Attendance::findOrFail($id);
        // 出欠確認データを更新
        $attendance->select = $request->select;
        //$attendance->comment = $request->comment;
        $attendance->save();

        // トップページへリダイレクトさせる
        return redirect('user/home');
    }


}
