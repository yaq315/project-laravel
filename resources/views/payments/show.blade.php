@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Payment Options</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h5>Booking Summary</h5>
                        <p><strong>Adventure:</strong> {{ $payment->booking->adventure->name }}</p>
                        <p><strong>Dates:</strong> {{ $payment->booking->start_date }} to {{ $payment->booking->end_date }}</p>
                        <p><strong>Group Size:</strong> {{ $payment->booking->group_size }} people</p>
                        <p><strong>Total Amount:</strong> ${{ number_format($payment->amount, 2) }}</p>
                    </div>

                    <form action="{{ route('payment.process', $payment->id) }}" method="POST" id="payment-form">
                        @csrf
                        
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" 
                                    id="cash-payment" value="cash" checked>
                                <label class="form-check-label" for="cash-payment">
                                    <strong>Cash Payment</strong>
                                </label>
                            </div>
                            <div class="mt-3 p-3 bg-light rounded">
                                <p>Please pay in cash when you arrive at our office or to the tour guide.</p>
                                <p>Office address: [Your Office Address Here]</p>
                                <p>Payment must be completed before the tour starts.</p>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-4" >
                            Confirm Cash Payment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection