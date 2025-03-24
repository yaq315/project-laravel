@extends('layouts.app')

@section('content')
<section class="section-margin section-margin--small">
    <div class="container">
        <h2 class="text-center mb-5">Book Your Adventure in Wadi Rum</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row pb-4">
            @if (!isset($adventures) || $adventures->isEmpty())
                <div class="col-12 text-center">
                    <p>No adventures available at the moment.</p>
                </div>
            @else
                @foreach ($adventures as $adventure)
                    <div class="col-md-6 col-xl-4 mb-5">
                        <div class="card card-explore shadow-sm">
                            <div class="card-explore__img">
                                <img class="card-img" src="{{ asset('img/home/' . $adventure->image) }}" alt="{{ $adventure->name }}" style="height: 250px; object-fit: cover;">
                            </div>
                            <div class="card-body">
                                <h3 class="card-explore__price">${{ number_format($adventure->price, 2) }} <sub>/ per night</sub></h3>
                                <h4 class="card-explore__title">{{ $adventure->name }}</h4>
                                <p class="text-muted">{{ $adventure->description }}</p>

                                <!-- Availability Calendar -->
                                <div class="form-group">
                                    <label>Available Dates</label>
                                    <div id="availability_calendar_{{ $adventure->id }}"></div>
                                </div>

                                <form action="{{ route('book.adventure', $adventure->id) }}" method="POST" onsubmit="return checkAuth(event)" id="booking_form_{{ $adventure->id }}">
                                    @csrf
                                    
                                    <div class="form-group">
                                        <label for="start_date_{{ $adventure->id }}">Start Date</label>
                                        <input type="date" 
                                               name="start_date" 
                                               id="start_date_{{ $adventure->id }}" 
                                               class="form-control" 
                                               min="{{ date('Y-m-d') }}"
                                               required>
                                        @error('start_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="end_date_{{ $adventure->id }}">End Date</label>
                                        <input type="date" 
                                               name="end_date" 
                                               id="end_date_{{ $adventure->id }}" 
                                               class="form-control" 
                                               min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                               required>
                                        @error('end_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="group_size_{{ $adventure->id }}">Group Size</label>
                                        <input type="number" 
                                               name="group_size" 
                                               id="group_size_{{ $adventure->id }}" 
                                               class="form-control" 
                                               min="1" 
                                               max="15"
                                               required>
                                        @error('group_size')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="reminder_preference_{{ $adventure->id }}">Reminder Preference</label>
                                        <select name="reminder_preference" 
                                                id="reminder_preference_{{ $adventure->id }}" 
                                                class="form-control">
                                            <option value="1">1 hour before</option>
                                            <option value="6">6 hours before</option>
                                            <option value="24" selected>24 hours before</option>
                                            <option value="72">3 days before</option>
                                        </select>
                                    </div>

                                    <!-- Price Calculation Display -->
                                    <div class="form-group price-calculation-container" style="display: none;">
                                        <div class="alert alert-info">
                                            <strong>Estimated Total:</strong> 
                                            <span id="calculated_price_{{ $adventure->id }}"></span>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block mt-3">
                                        <i class="fas fa-calendar-check"></i> Book Now
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
function checkAuth(event) {
    @auth
        return true;
    @else
        event.preventDefault();
        if(confirm('You need to login to complete booking. Go to login page now?')) {
            window.location.href = "{{ route('login') }}";
        }
        return false;
    @endauth
}

// Initialize datepickers and price calculation
$(document).ready(function() {
    @foreach($adventures as $adventure)
    // Availability Calendar
    $('#availability_calendar_{{ $adventure->id }}').datepicker({
        datesDisabled: {!! json_encode($adventure->booked_dates) !!},
        format: 'yyyy-mm-dd',
        startDate: new Date(),
        todayHighlight: true
    }).on('changeDate', function(e) {
        $('#start_date_{{ $adventure->id }}').val(e.format('yyyy-mm-dd'));
    });

    // Price Calculation
    $('#booking_form_{{ $adventure->id }} input, #booking_form_{{ $adventure->id }} select').change(function() {
        const form = $('#booking_form_{{ $adventure->id }}');
        const pricePerNight = parseFloat(form.find('.card-explore__price').text().replace(/[^0-9.]/g, ''));
        const startDate = new Date(form.find('input[name="start_date"]').val());
        const endDate = new Date(form.find('input[name="end_date"]').val());
        const groupSize = parseInt(form.find('input[name="group_size"]').val()) || 1;
        
        if (startDate && endDate && startDate < endDate) {
            const nights = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
            const totalPrice = pricePerNight * nights * groupSize;
            
            form.find('.price-calculation-container').show();
            form.find('#calculated_price_{{ $adventure->id }}').html(
                '$' + totalPrice.toFixed(2) + 
                ' (' + nights + ' night' + (nights !== 1 ? 's' : '') + 
                ' × ' + groupSize + ' person' + (groupSize !== 1 ? 's' : '') + ')'
            );
        }
    });
    @endforeach
});
</script>
@endpush
@endsection