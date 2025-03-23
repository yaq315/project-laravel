<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder; 

class DashboardController extends Controller
{
    public function index()
    {
        
        $totalUsers = User::count();
        $userGrowth = $this->calculateGrowth(User::query(), 'month');

       
        $totalAdmins = User::where('role', 'admin')->count();
        $adminGrowth = $this->calculateGrowth(User::where('role', 'admin'), 'month');

     
        $todayBookings = Booking::whereDate('created_at', Carbon::today())->count();
        $bookingGrowthToday = $this->calculateGrowth(Booking::whereDate('created_at', Carbon::today()), 'day');



        $monthlyBookings = Booking::whereMonth('created_at', Carbon::now()->month)->count();
        $bookingGrowthMonthly = $this->calculateGrowth(Booking::whereMonth('created_at', Carbon::now()->month), 'month');


        $bookings = Booking::with(['user', 'adventure'])->latest()->get();

       

        return view('dashboard', compact(
            'totalUsers',
            'userGrowth',
            'totalAdmins',
            'adminGrowth',
            'todayBookings',
            'bookingGrowthToday',
            'monthlyBookings',
            'bookingGrowthMonthly',
            'bookings'
        ));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.edit', compact('booking'));
    }

    // تحديث الحجز
    public function update(Request $request, $id)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:confirmed,in_progress,rejected',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard')->with('success', 'Booking updated successfully!');
    }

    // حذف الحجز
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('dashboard')->with('success', 'Booking deleted successfully!');
    }

    /**
     * 
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $period 
     * @return float 
     */
    private function calculateGrowth(Builder $query, string $period): float
    {
     
        if (!is_object($query) || !method_exists($query, 'count')) {
            return 0;
        }

        $current = $query->count();

        
        $previousQuery = clone $query;
        $previous = 0;

        if ($period === 'month') {
            $previous = $previousQuery->whereBetween('created_at', [
                Carbon::now()->subMonth()->startOfMonth(),
                Carbon::now()->subMonth()->endOfMonth()
            ])->count();
        } elseif ($period === 'day') {
            $previous = $previousQuery->whereDate('created_at', Carbon::yesterday())->count();
        }

        if ($previous == 0) {
            return 0;
        }

     
        return round((($current - $previous) / $previous) * 100, 2);
    }

    /**
     * 
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function filter(Request $request)
    {
        $query = Booking::query();

        
        if ($request->status) {
            $query->where('status', $request->status);
        }

        
        if ($request->start_date) {
            $query->whereDate('start_date', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('end_date', '<=', $request->end_date);
        }

     
        $bookings = $query->with(['user', 'adventure'])->get();

        $totalUsers = User::count();
        $userGrowth = $this->calculateGrowth(User::query(), 'month');
        $totalAdmins = User::where('role', 'admin')->count();
        $adminGrowth = $this->calculateGrowth(User::where('role', 'admin'), 'month');
        $todayBookings = Booking::whereDate('created_at', Carbon::today())->count();
        $bookingGrowthToday = $this->calculateGrowth(Booking::whereDate('created_at', Carbon::today()), 'day');
        $monthlyBookings = Booking::whereMonth('created_at', Carbon::now()->month)->count();
        $bookingGrowthMonthly = $this->calculateGrowth(Booking::whereMonth('created_at', Carbon::now()->month), 'month');



        return view('dashboard', compact(
            'totalUsers',
            'userGrowth',
            'totalAdmins',
            'adminGrowth',
            'todayBookings',
            'bookingGrowthToday',
            'monthlyBookings',
            'bookingGrowthMonthly',
            'bookings'
        ));
    }
}