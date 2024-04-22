<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\RentPayment;
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
}
