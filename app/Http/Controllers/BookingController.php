<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adventure;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth; // تأكد من استيراد Auth
use Illuminate\Support\Facades\DB; 
use App\Models\Payment;
class BookingController extends Controller
{
    public function index()
    {
        $adventures = Adventure::all();
        return view('booking', compact('adventures'));
    }

    public function bookAdventure(Request $request, $adventureId)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'group_size' => 'required|integer|min:1',
        ]);

        // حساب عدد الأيام والسعر
        $adventure = Adventure::findOrFail($adventureId);
        $startDate = new \DateTime($request->start_date);
        $endDate = new \DateTime($request->end_date);
        $days = $endDate->diff($startDate)->days;
        $totalAmount = $days * $adventure->price * $request->group_size;

        // إنشاء الحجز
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'adventure_id' => $adventureId,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'group_size' => $request->group_size,
            'status' => 'pending',
        ]);

        // إنشاء سجل الدفع
        $payment = Payment::create([
            'user_id' => Auth::id(),
            'booking_id' => $booking->id,
            'amount' => $totalAmount,
            'status' => 'pending',
        ]);

        // إرجاع معرف الدفع لعرض نموذج الدفع
        return redirect()->route('payment.show', $payment->id);
    }
}