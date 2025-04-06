<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    
    public function index($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        return view('reviews.index', [
            'booking' => $booking,
            'bookingId' => $bookingId 
        ]);
    }

   
    public function store(Request $request, $bookingId)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'nullable|string',
        ]);

        $booking = Booking::findOrFail($bookingId);
        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->booking_id = $booking->id;
        $review->rating = $validated['rating'];
        $review->review = $validated['review'];
        $review->save();

        return redirect()->route('reviews.index', ['booking' => $bookingId])
            ->with('success', 'Your review has been submitted successfully!');
    }
}