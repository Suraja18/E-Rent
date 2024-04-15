<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Friends;
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
                $message = "Friends";
            } else {
                $friendRequest->delete();
                $message = "Friend Removed";
            }
            return response()->json(['success' => true, 'message' => $message]);
        }

        return response()->json(['success' => false, 'message' => 'Friend request not found.']);
    }
}
