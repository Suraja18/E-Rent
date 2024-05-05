<?php

namespace App\Http\Controllers\Landlord;

use App\Events\SentMessage;
use App\Http\Controllers\Controller;
use App\Models\Friends;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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
        $contacts = Friends::where('type', 'Accepted')
            ->where(function ($query) use ($userId) {
                $query->where('friends.user_id', $userId)
                      ->orWhere('friends.sent_id', $userId);
            })
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('messages')
                      ->whereRaw('messages.friend_id = friends.id');
            })
            ->get();
        $data = ['messages' => $messages, 'contacts' => $contacts,];
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
        $contacts = Friends::where('type', 'Accepted')
            ->where(function ($query) use ($userId) {
                $query->where('friends.user_id', $userId)
                      ->orWhere('friends.sent_id', $userId);
            })
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('messages')
                      ->whereRaw('messages.friend_id = friends.id');
            })
            ->get();
        $data = ['messages' => $messages, 'contacts' => $contacts,];
        return view('Tenants.messages', $data);
    }
    public function sendMessages(Request $request)
    {
        $request->validate([
            'friend_id' => 'required|exists:friends,id',
            'message' => 'nullable|string',
            'image' => 'nullable|file|image',
            'message' => 'required_without_all:image',
            'image' => 'required_without_all:message',
        ]);
        $message = new Messages();
        $message->friend_id = $request->friend_id;
        $message->sent_by = auth()->id();
        $message->message = $request->message;
        $image1 = $request->image;
        if ($image1) {
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move('Images/Variable/Messages', $imageName);
            $message->image = "Images/Variable/Messages/" . $imageName;
        }
        $message->save();
        if($message->friend->sentBy->id == Auth::id())
        {
            $frdID = User::find($message->friend->user->id);
            $sendID = User::find($message->friend->sentBy->id);
        }else{
            $frdID = User::find($message->friend->sentBy->id);
            $sendID = User::find($message->friend->user->id);
        }
        event(new SentMessage($message, $frdID, $sendID));
        
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
        $message = Messages::findOrFail($messageId);
        if($message->image){
            File::delete($message->image);
        }
        if($message->sent_by == Auth::id())
        {
            $message->delete();
        }else{
            $message->deleted_by = Auth::id();
            $message->update();
        }
        return response()->json(['success' => true]);
    }
}
