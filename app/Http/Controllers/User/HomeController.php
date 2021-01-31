<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MessageRoom;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }
    
    
    public function index()
    {
        $user = \Auth::user();
        
        $today = Carbon::today();
        $year_month_day = $today->toDateString();
        $day_of_week = $today->dayOfWeek;
        $week_list = ['0' => '日', '1' => '月', '2' => '火', '3' => '水', '4' => '木', '5' => '金', '6' => '土'];
    
        $attendance = $user->attendances()->where('what_day', $year_month_day)->get()[0];
        $attendanceLists = ['0' => '選択してください', '1' => '通所する', '2' => '在宅ワーク', '3' => '施設外', '4' => '休む'];
        
        $message_room_id = $user->user_messages()->first()->message_room_id;
        $message_room = MessageRoom::findOrFail($message_room_id);
        
        return view('user.home', [
            'attendance' => $attendance,
            'user' => $user,
            'message_room' => $message_room,
            'attendanceLists' => $attendanceLists,
            'day_of_week' => $day_of_week,
            'week_list' => $week_list,
        ]);
    }
}
