<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\StaffMessage;

class StaffMessagesController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $staff = \Auth::guard('staff')->user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $staff_messages = $staff->staff_messages()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'staff' => $staff,
                'staff_messages' => $staff_messages,
            ];
        }
        return view('staff.auth.staff_messages', $data);
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);
        
        /*
        ※なんでか分からないが$request->staff()では呼び出せず
        　$request->user()で呼び出しが可能
        */
        $request->user()->staff_messages()->create([
            'content' => $request->content,
        ]);
    
        return back();
    }



    public function destroy($id)
    {
        $staff_message = StaffMessage::findOrFail($id);
        
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $staff_message->staff_id) {
            $staff_message->delete();
        }
    
        // 前のURLへリダイレクトさせる
        return back();
    }
}
