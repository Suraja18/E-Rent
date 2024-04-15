<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sendMessage()
    {
        $userId = Auth::id();
        $messages = Messages::join('friends', 'messages.friend_id', '=', 'friends.id')
            ->select('messages.*')
            ->where('friends.type', 'Accepted')
            ->where(function ($query) use ($userId) {
                $query->where('friends.user_id', $userId)
                    ->orWhere('friends.sent_id', $userId);
            })
            ->get();
        $data = ['messages' => $messages, ];
        // return $data;
        return view('Landlords.Message.send-message', $data);
    }
    public function sendMessages(Request $request)
    {
        $request->validate([
            'friend_id' => 'required|exists:friends,id',
            'message' => 'required|string',
        ]);
        $message = new Messages();
        $message->friend_id = $request->friend_id;
        $message->sent_by = auth()->id();
        $message->message = $request->message;
        $message->save();
        
        return response()->json(['success' => true, 'message' => 'Message sent successfully']);
    }
}
