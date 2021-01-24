<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'content' => 'required|max:255',
        ]);

        $staff = \Auth::guard('staff')->user();
        
        $message = new Message;
        $message->message_room_id = $request->message_room_id;
        $message->account_type = 0;
        $message->content = $request->content;
        $message->save();

        $staff->sent_staff_messages($message->id);
    
        return back();
    }



    public function destroy(Request $request)
    {
        $message = Message::findOrFail($request->message_id);

        if (\Auth::id() === $message->staff_messages[0]['id']) {
            $message->delete();
        }
        
        return back();
    }
}
