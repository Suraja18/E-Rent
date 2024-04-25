<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\RatingReply;
use App\Models\RentPayment;
use App\Models\webReview;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RatingController extends Controller
{
    public function submitRating(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'review' => 'required|string|max:1000',
            'rented_id' => [
                'required',
                'integer',
                Rule::exists('rent_properties', 'id'),
            ]
        ]);
    
        $rating = new Rating();
        $rating->user_id = Auth::id();
        $rating->rented_id = $validated['rented_id'];
        $user_id = Auth::id();
        $rented_id = $request->input('rented_id');
        $existingRating = Rating::where('user_id', $user_id)
            ->where('rented_id', $rented_id)
            ->first();
        if ($existingRating) {
            return response()->json('You have already reviewed this product.', 422);
        }
        $rating->rate = $validated['rating'];
        $rating->review = $validated['review'];
        $rating->save();
    
        return response()->json([
            'message' => 'Thank you for your review!',
            'userName' => Auth::user()->first_name.' '. Auth::user()->last_name,
            'userImage' => asset(Auth::user()->image),
            'review' => $validated['review'],
            'rating' => $validated['rating'],
            'rateId' => $rating->id,
        ]);
    
    }
    public function updateReview(Request $request, $ratingId)
    {
        $rating = Rating::find($ratingId);
        $validated = $request->validate([
            'review' => 'required|string|max:1000',
        ]);
        $rating->review = $request->review;
        $rating->update();
        Alert::success('Your review updated successfully');
        return redirect()->back();
    }
    public function deleteReview(string $ratingId)
    {
        $rating = Rating::find($ratingId);
        $rating->delete();
        Alert::success('Your review removed successfully');
        return redirect()->back();
    }
    public function deleteReply(string $ratingId)
    {
        $rating = RatingReply::find($ratingId);
        $rating->delete();
        Alert::success('Your reply removed successfully');
        return redirect()->back();
    }
    public function replyReview(Request $request)
    {
        $validate = $request->validate([
            'reply' => 'required|string|min:2',
            'ratingID' => 'required|exists:ratings,id'
        ]);
        if($validate)
        {
            $rating = new RatingReply();
            $rating->user_id = Auth::id();
            $rating->rating_id = $request->ratingID;
            $rating->reply = $request->reply;
            $rating->save();
            Alert::success('Your have replied successfully');
            return redirect()->back();
        }
       
    }
    public function websiteReview(Request $request)
    {
        $validate = $request->validate([
            'rating' => 'required|numeric|in:0.5,1,1.5,2,2.5,3,3.5,4,4.5,5',
            'review' => 'required|string|min:3|max:450'
        ]);
        if($validate)
        {
            $existingReview = webReview::where('user_id', Auth::id())->first();
            if ($existingReview) {
                Alert::error('You have already submitted a review for our website.');
                return redirect()->back();
            }
            $rating = new webReview();
            $rating->user_id = Auth::id();
            $rating->rate = $request->rating;
            $rating->review = $request->review;
            $rating->save();
            Alert::success('Thank you for giving  your review!');
            return redirect()->back();
        }
    }
}
