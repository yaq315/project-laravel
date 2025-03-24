@extends('layouts.app')



@section('content')
    <h2 style="color: #cca772; font-family: 'Arial', sans-serif; text-align: center; margin-bottom: 20px;">Payment History</h2>
    
    <table style="width: 100%; border-collapse: collapse; background-color: #fff; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        <thead>
            <tr>
                <th style="padding: 12px; text-align: left; background-color: #cca772; color: #fff; font-weight: bold; border-bottom: 2px solid #ddd;">Booking ID</th>
                <th style="padding: 12px; text-align: left; background-color: #cca772; color: #fff; font-weight: bold; border-bottom: 2px solid #ddd;">Amount</th>
                <th style="padding: 12px; text-align: left; background-color: #cca772; color: #fff; font-weight: bold; border-bottom: 2px solid #ddd;">Status</th>
                <th style="padding: 12px; text-align: left; background-color: #cca772; color: #fff; font-weight: bold; border-bottom: 2px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                    <td style="padding: 12px; color: #000;">#{{ $payment->booking->id }}</td>
                    <td style="padding: 12px; color: #000;">{{ $payment->amount }}$</td>
                    <td style="padding: 12px; color: #000;">
                        {{ $payment->status == 'pending' ? '🚧 Pending' : '✅ Paid' }}
                    </td>
                    <td style="padding: 12px;">
                        @if ($payment->status == 'paid')
                            <a href="{{ route('payments.invoice', $payment) }}" style="color: #000; text-decoration: none; font-weight: bold; border: 1px solid #cca772; padding: 5px 10px; border-radius: 4px; background-color: #cca772; color: #fff;">📄 Download Invoice</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
