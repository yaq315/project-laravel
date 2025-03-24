<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $payment->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice-box { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; }
        .header { text-align: center; margin-bottom: 40px; }
        .logo { font-size: 24px; font-weight: bold; color: #cca772; }
        .details { margin-bottom: 30px; }
        table { width: 100%; line-height: inherit; text-align: left; }
        table td { padding: 5px; vertical-align: top; }
        table tr td:nth-child(2) { text-align: right; }
        .total { font-weight: bold; font-size: 18px; border-top: 2px solid #eee; }
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
                    <td><strong>Issued:</strong> {{ now()->format('Y-m-d') }}</td>
                    <td><strong>Due:</strong> {{ now()->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <td><strong>Booking ID:</strong> #{{ $payment->booking->id }}</td>
                    <td><strong>Transaction ID:</strong> {{ $payment->transaction_id }}</td>
                </tr>
            </table>
        </div>
        <div class="alert alert-success">
            <h5>Cash Payment Instructions</h5>
            <p>Your booking has been confirmed with cash payment option.</p>
            <p><strong>Amount to pay:</strong> ${{ number_format($payment->amount, 2) }}</p>
            <p><strong>Payment location:</strong> [Your Office Address]</p>
            <p><strong>Payment deadline:</strong> Before {{ $payment->booking->start_date }}</p>
        </div>

        <div class="form-group mt-3">
            <label for="cash-notes">Additional Notes (Optional)</label>
            <textarea name="notes" id="cash-notes" class="form-control" rows="3"></textarea>
        </div>
        <table>
            <tr>
                <th>Description</th>
                <th>Amount</th>
            </tr>
            <tr>
                <td>{{ $payment->booking->adventure->name }} ({{ $payment->booking->start_date }} to {{ $payment->booking->end_date }})</td>
                <td>${{ number_format($payment->amount, 2) }}</td>
            </tr>
            <tr class="total">
                <td>Total</td>
                <td>${{ number_format($payment->amount, 2) }}</td>
            </tr>
        </table>
        
        <div style="margin-top: 50px; text-align: center; font-size: 12px; color: #777;">
            Thank you for choosing RumQuest for your adventure!
        </div>
    </div>
</body>
</html>