@extends('layouts.app')

@section('content')
    <h2 style="color: #cca772; font-family: 'Arial', sans-serif; text-align: center; margin-bottom: 20px;">Review for Booking #{{ $booking->id }}</h2>

    @if (session('success'))
        <div style="color: green; text-align: center; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="margin-bottom: 20px;">
        @foreach ($booking->reviews as $review)
            <div style="border-bottom: 1px solid #ddd; padding: 10px;">
                <p><strong>Rating:</strong> 
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->rating)
                            <span style="color: gold;">⭐️</span>
                        @else
                            <span>⭐️</span>
                        @endif
                    @endfor
                </p>
                <p><strong>Review:</strong> {{ $review->review ?? 'No review given' }}</p>
            </div>
        @endforeach
    </div>

    <form action="{{ route('reviews.store', $booking->id) }}" method="POST" style="border: 1px solid #ccc; padding: 20px; background-color: #f9f9f9;">
        @csrf
        <div style="margin-bottom: 10px;">
            <label for="rating" style="display: block;">Rating (1-5)</label>
            <div style="display: flex;">
                @for ($i = 1; $i <= 5; $i++)
                    <label>
                        <input type="radio" name="rating" value="{{ $i }}" required style="margin: 0 5px;">
                        <span style="font-size: 20px; color: #cca772;">⭐️</span>
                    </label>
                @endfor
            </div>
        </div>
        <div style="margin-bottom: 10px;">
            <label for="review" style="display: block;">Review</label>
            <textarea id="review" name="review" rows="4" style="padding: 8px; width: 100%;"></textarea>
        </div>
        <button type="submit" style="background-color: #cca772; color: #fff; padding: 10px 15px; border: none; border-radius: 4px;">Submit Review</button>
    </form>

    <div style="margin-top: 20px;">
        <a href="{{ route('reviews.index', ['booking' => $booking->id]) }}" class="nav-link" style="color: #cca772;">Back to Reviews</a>
    </div>
@endsection