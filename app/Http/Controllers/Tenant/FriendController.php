<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Friends;
use App\Models\Messages;
use App\Models\User;
use App\Notifications\FriendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function addFriend(Request $request)
    {
        $friendId = $request->input('friend_id'); 
        Friends::create([
            'user_id' => auth()->id(),
            'sent_id' => $friendId,
            'type' => 'New'
        ]);
        $friend = User::find($friendId);
        if ($friend) {
            $friend->notify(new FriendNotification([
                'friendMessage' => "New Friend Request from ". auth()->user()->first_name . " " . auth()->user()->last_name  . ".",
            ]));
        }
        return response()->json(['success' => true]);
    }
    public function updateFriendRequest(Request $request)
    {
        $requestId = $request->input('request_id');
        $type = $request->input('type');
        $friendRequest = Friends::where('user_id', $requestId)->where('sent_id', Auth::id())->first();
        if ($friendRequest) {
            if ($type) {
                $friendRequest->type = $type;
                $friendRequest->save();
                $message = new Messages();
                $message->friend_id = $friendRequest->id;
                $message->sent_by = auth()->id();
                $message->message = "Hi";
                $message->save();
                $message = "Friends";
                $friend = User::find($requestId); 
                if ($friend) {
                    $friend->notify(new FriendNotification([
                        'friendMessage' => auth()->user()->first_name . " " . auth()->user()->last_name  . " has accepted your request. Send More Friend Request",
                    ]));
                }
            } else {
                $friendRequest->delete();
                $message = "Friend Removed";
            }
            return response()->json(['success' => true, 'message' => $message]);
        }

        return response()->json(['success' => false, 'message' => 'Friend request not found.']);
    }
    public function view()
    {
        return view('Tenants.friends');
    }
}
