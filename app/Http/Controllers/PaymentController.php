<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::where('user_id', auth()->id())->with('booking')->get();
        return view('payments.index', compact('payments'));
    }


    public function show($paymentId)
    {
        try {
            $payment = Payment::with(['booking', 'booking.adventure'])->findOrFail($paymentId);
            return view('payments.show', compact('payment'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Payment not found: '.$e->getMessage());
        }
    }
    
    public function process(Request $request, $paymentId)
    {
        $request->validate([
            'payment_method' => 'required|in:cash',
        ]);
    
        try {
            $payment = Payment::with('booking')->findOrFail($paymentId);
            
            $payment->update([
                'status' => Payment::STATUS_PENDING_CASH,
                'payment_method' => 'cash',
                'transaction_id' => 'CASH-' . uniqid(),
                'paid_at' => null, 
            ]);
            
            return redirect()->route('payments.success', $payment->id);
            
        } catch (\Exception $e) {
            return back()->with('error', 'Payment processing failed: '.$e->getMessage());
        }
    }

    public function success($paymentId)
    {
        $payment = Payment::with('booking.adventure')->findOrFail($paymentId);
        return view('payments.success', compact('payment'));
    }

    public function confirmCashPayment(Payment $payment)
    {
        $payment->update([
            'status' => Payment::STATUS_PAID,
            'paid_at' => now(),
        ]);
        
        return back()->with('success', 'confirmd cash success');
    }

    public function generateInvoice(Payment $payment)
    {
        try {
            $payment->load([
                'booking',
                'booking.adventure',
                'user'
            ]);
    
            if (!$payment->booking) {
                throw new \Exception("No booking associated with this payment");
            }
    
            $pdf = Pdf::loadView('payments.invoice', compact('payment'));
            return $pdf->download('invoice-'.$payment->id.'.pdf');
    
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to generate invoice: '.$e->getMessage());
        }
    }

    // في PaymentController

}
