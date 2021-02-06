<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; //追加
use App\Models\MessageRoom;
use App\Models\Message;
use Carbon\Carbon;

class UsersController extends Controller
{
    protected function create()
    {
        $user = new User;
        
        return view('staff.auth.ussers_create', [
            'user' => $user,
        ]);
    }
    
    
    public function store(Request $request)
    {
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

        $today = Carbon::today();
        $year_month_day = $today->toDateString();
        $user->attendances()->create([
            'what_day' => $year_month_day,
            'select' => '0',
        ]);

        $message_room = new MessageRoom;
        $message_room->room_name = $user->last_name_hiragana.$user->first_name_hiragana;
        $message_room->save();
        
        $message = new Message;
        $message->message_room_id = $message_room->id;
        $message->account_type = 1;
        $message->content = $user->last_name . $user->first_name . 'さんがメッセージルームに追加されました';
        $message->save();
     
        $user->sent_user_messages($message->id);

        return redirect('staff/users');
    }
    
    
    public function index()
    {
        $users = User::orderBy('last_name_hiragana')->paginate(100);

        return view('staff.auth.users_index', [
            'users' => $users,
        ]);
    }
    

    public function show($id)
    {
        $user = User::findOrFail($id);
        
        $today = Carbon::today();
        $year_month_day = $today->toDateString();
        $day_of_week = $today->dayOfWeek;
        $week_list = ['0' => '日', '1' => '月', '2' => '火', '3' => '水', '4' => '木', '5' => '金', '6' => '土'];
    
        if($user->attendances()->where('what_day', $year_month_day)->exists()) {
            $attendance = $user->attendances()->where('what_day', $year_month_day)->get()[0];
        }else{
            $attendance = null;
        }
    
        //$attendance = $user->attendances()->where('what_day', $year_month_day)->get()[0];
        $attendanceList = ['未入力', '通所する', '在宅ワーク', '施設外', '休む'];

        $message_room_id = $user->user_messages()->first()->message_room_id;
        $message_room = MessageRoom::findOrFail($message_room_id);
        $messages = $message_room->messages()->orderBy('created_at', 'desc')->paginate(15);

        return view('staff.auth.user_show', [
            'user' => $user,
            'attendance' => $attendance,
            'attendanceList' => $attendanceList,
            'messages' => $messages,
            'message_room_id' => $message_room_id,
            'day_of_week' => $day_of_week,
            'week_list' => $week_list,
            'year_month_day' => $year_month_day,
        ]);
    }


 
    public function edit($id)
    {
        $user = User::findOrFail($id);
    
        return view('staff.auth.user_edit', [
            'user' => $user,
        ]);
    }
    

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

    public function destroy_show($id)
    {
        $user = User::findOrFail($id);
        
        return view('staff.auth.user_destroy_show', [
                'user' => $user,
        ]);
    }
    

    public function destroy($id)
    {

        $user = User::findOrFail($id);

        $user_message_room = $user->user_messages()->first()->message_room();
        
        $user_message_room->delete();
        
        $user->delete();

        return redirect('staff/users');
    }
}
