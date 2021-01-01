<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;

class StaffMessagesController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $staff = \Auth::staff();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $staff_messages = $staff->staff_messages()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'staff' => $staff,
                'staff_messages' => $staff_messages,
            ];
        }

        //return view('welcome', $data);
        return redirect('staff/home', $data);
    }
}
