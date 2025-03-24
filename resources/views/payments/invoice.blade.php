<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $payment->id }}</title>
    <style>
        /* Your existing styles */
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="header">
            <div class="logo">RumQuest</div>
            <h2>Invoice #{{ $payment->id }}</h2>
        </div>
        
        <div class="details">
            <table>
                <tr>
                    <td><strong>Customer:</strong> {{ $payment->user->name }}</td>
                    <td><strong>Date:</strong> {{ now()->format('Y-m-d') }}</td>
                </tr>
                @if($payment->booking && $payment->booking->adventure)
                <tr>
                    <td><strong>Adventure:</strong> {{ $payment->booking->adventure->name }}</td>
                    <td><strong>Booking ID:</strong> #{{ $payment->booking->id }}</td>
                </tr>
                @endif
            </table>
        </div>
        
        <table>
            <tr>
                <th>Description</th>
                <th>Amount</th>
            </tr>
            @if($payment->booking)
            <tr>
                <td>
                    @if($payment->booking->adventure)
                        {{ $payment->booking->adventure->name }}
                    @else
                        Adventure Booking
                    @endif
                    ({{ $payment->booking->start_date }} to {{ $payment->booking->end_date }})
                </td>
                <td>${{ number_format($payment->amount, 2) }}</td>
            </tr>
            @endif
            <tr class="total">
                <td>Total</td>
                <td>${{ number_format($payment->amount, 2) }}</td>
            </tr>
        </table>
    </div>
</body>
</html>