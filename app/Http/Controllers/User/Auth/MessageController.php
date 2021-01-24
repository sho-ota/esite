<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\MessageRoom;

class MessageController extends Controller
{
    public function index($id)
    {
        $message_room_id = $id;
        $message_room = MessageRoom::findOrFail($message_room_id);
        $messages = $message_room->messages()->orderBy('created_at', 'desc')->paginate(15);

        return view('user.auth.messages', [
            'messages' => $messages,
            'message_room_id' => $message_room_id,
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
