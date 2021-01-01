<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMessage;

class UserMessagesController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $user_messages = $user->user_messages()->orderBy('created_at', 'desc')->paginate(15);
            
            $data = [
                'user' => $user,
                'user_messages' => $user_messages,
            ];
        }

        return view('user.auth.user_messages', $data);
    }



    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);
    
        $request->user()->user_messages()->create([
            'content' => $request->content,
        ]);
    
        return back();
    }



    public function destroy($id)
    {
        $user_message = UserMessage::findOrFail($id);
        
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $user_message->user_id) {
            $user_message->delete();
        }
    
        // 前のURLへリダイレクトさせる
        return back();
    }

}
