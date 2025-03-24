<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adventure;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\BookingReminder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notifications\BookingReminderNotification;
use App\Notifications\BookingStatusUpdatedNotification;
use Carbon\Carbon;
use App\Notifications\BookingConfirmation;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    /**
     * عرض صفحة الحجوزات
     */
    public function index()
    {
        $adventures = Adventure::all();
        return view('booking', compact('adventures'));
    }

    /**
     * معالجة إنشاء حجز جديد
     */
    public function bookAdventure(Request $request, $adventureId)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'group_size' => 'required|integer|min:1',
        ]);
    
        DB::beginTransaction();
    
        try {
            // حساب عدد الأيام والسعر
            $adventure = Adventure::findOrFail($adventureId);
            $startDate = Carbon::parse($request->start_date);
            $endDate = Carbon::parse($request->end_date);
            $days = $endDate->diffInDays($startDate);
            $totalAmount = $days * $adventure->price * $request->group_size;
    
            // إنشاء الحجز
            $booking = Booking::create([
                'user_id' => Auth::id(),
                'adventure_id' => $adventureId,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'group_size' => $request->group_size,
                'status' => 'confirmed',
                'reminder_preference' => $request->reminder_preference ?? 24,
            ]);
    
            // إنشاء سجل الدفع
            $payment = Payment::create([
                'user_id' => Auth::id(),
                'booking_id' => $booking->id,
                'amount' => $totalAmount,
                'status' => 'pending',
            ]);
    
            // جدولة التذكيرات
            $this->scheduleBookingReminders($booking);
    
            // إرسال إشعار التأكيد
            try {
                Auth::user()->notify(new BookingConfirmation($booking));
            } catch (\Exception $e) {
                Log::error('Failed to send booking confirmation: ' . $e->getMessage());
            }
    
            DB::commit();
    
            return redirect()->route('payment.show', $payment->id)
                ->with('success', 'Booking confirmed!');
    
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Booking failed: ' . $e->getMessage());
            return back()->with('error', 'Booking failed: ' . $e->getMessage());
        }
    }

    /**
     * جدولة تذكيرات الحجز
     */protected function scheduleBookingReminders(Booking $booking)
{
    try {
        $reminderTimes = [
            $booking->reminder_preference ?? 24, // التفضيل المختار من المستخدم
            1 // تأكيد قبل ساعة واحدة دائماً
        ];

        foreach (array_unique($reminderTimes) as $hours) {
            BookingReminder::create([
                'booking_id' => $booking->id,
                'reminder_time' => $booking->start_date->copy()->subHours($hours),
                'type' => 'email',
                'sent_at' => null,
            ]);
        }
    } catch (\Exception $e) {
        Log::error('Failed to schedule reminders: ' . $e->getMessage());
    }
}

    /**
     * تحديث حالة الحجز
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:confirmed,cancelled,completed,postponed'
        ]);

        $oldStatus = $booking->status;
        $booking->update(['status' => $request->status]);

        // إرسال إشعار بالتغيير
        if ($oldStatus != $request->status) {
            $booking->user->notify(
                new BookingStatusUpdatedNotification($booking, $oldStatus)
            );
        }

        // إذا كان الحجز مؤكداً، قم بجدولة التذكيرات
        if ($request->status == 'confirmed') {
            $this->scheduleBookingReminders($booking);
        }

        return back()->with('success', 'تم تحديث حالة الحجز بنجاح');
    }

    /**
     * إرسال تذكير يدوي
     */
    public function sendManualReminder(Booking $booking)
    {
        try {
            $booking->user->notify(new BookingReminderNotification($booking));
            
            return back()->with('success', 'تم إرسال التذكير بنجاح');
            
        } catch (\Exception $e) {
            return back()->with('error', 'فشل إرسال التذكير: ' . $e->getMessage());
        }
    }

    /**
     * تحديث تفضيلات التذكير
     */
    public function updateReminderPreference(Request $request, Booking $booking)
    {
        $request->validate([
            'reminder_preference' => 'required|in:1,6,24,72'
        ]);

        $booking->update(['reminder_preference' => $request->reminder_preference]);

        // حذف التذكيرات القديمة وجدولة جديدة
        $booking->reminders()->delete();
        $this->scheduleBookingReminders($booking);

        return back()->with('success', 'تم تحديث تفضيلات التذكير بنجاح');
    }

    /**
     * عرض صفحة الحجز
     */
    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);
        
        return view('bookings.show', [
            'booking' => $booking->load(['adventure', 'payment', 'reminders'])
        ]);
    }
}