<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\MessageRoom;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function index($id)
    {
        $user = \Auth::user();
        
        $today = Carbon::today();
        $year_month_day = $today->toDateString();
        $day_of_week = $today->dayOfWeek;
        $week_list = ['0' => '日', '1' => '月', '2' => '火', '3' => '水', '4' => '木', '5' => '金', '6' => '土'];
    
    
        if($user->attendances()->where('what_day', $year_month_day)->exists()) {
            $attendance = $user->attendances()->where('what_day', $year_month_day)->get()[0];
        }else{
            $attendance = null;
        }
    
        $attendanceList = ['未入力', '通所する', '在宅ワーク', '施設外', '休む'];
        
        $message_room_id = $id;
        $message_room = MessageRoom::findOrFail($message_room_id);
        $messages = $message_room->messages()->orderBy('created_at', 'desc')->paginate(15);

        return view('user.auth.messages', [
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
    
    public function store(Request $request)
    {

        $request->validate([
            'content' => 'required|max:255',
        ]);

        $user = \Auth::guard('user')->user();
        
        $message = new Message;
        $message->message_room_id = $request->message_room_id;
        $message->account_type = 1;
        $message->content = $request->content;
        $message->save();
        
        $user->sent_user_messages($message->id);
    
        return back();
    }



    public function destroy(Request $request)
    {
        $message = Message::findOrFail($request->message_id);
        $message_room = MessageRoom::findOrFail($request->message_room_id);
        $message_1st_id = $message_room->messages()->where('account_type', '1')->get()[0]['id'];

        if ($message->id == $message_1st_id) {
            return back();
        }

        if (\Auth::id() === $message->user_messages[0]['id']) {
            $message->delete();
        }
        
        return back();
    }
}
