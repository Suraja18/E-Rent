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
        return view('Landlords.Message.send-message', $data);
    }
    public function sendTenantMessage()
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
        return view('Tenants.messages', $data);
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
    public function markAsRead(Request $request)
    {
        $friendId = $request->input('friend_id');
        Messages::where('friend_id', $friendId)
            ->where('sent_by', '!=', auth()->id())
            ->update(['read_at' => now()]);

        return response()->json(['success' => true]);
    }
    public function deleteMessage(Request $request)
    {
        $messageId = $request->input('message_id');
        Messages::where('id', $messageId)->delete();
        return response()->json(['success' => true]);
    }
}
