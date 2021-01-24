<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MessageRoom;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }
    
    
    public function index()
    {

        $user = \Auth::user();
        
        $attendance = $user->attendances()->orderByDesc('created_at')->first();
        
        $message_room_id = $user->user_messages()->first()->message_room_id;
        
        $message_room = MessageRoom::findOrFail($message_room_id);

        return view('user.home', [
            'attendance' => $attendance,
            'user' => $user,
            'message_room' => $message_room,
        ]);
    }
}
