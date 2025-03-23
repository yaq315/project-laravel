<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adventure;

class AdventureController extends Controller
{
    public function index()
    {
        $adventures = Adventure::all();
        return view('booking', compact('adventures'));
    }

    public function search(Request $request)
    {
        $keywords = $request->input('keywords');
        $adventureType = $request->input('adventure_type');
        $groupSize = $request->input('group_size');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $duration = $request->input('duration');

        $query = Adventure::query();

        if ($keywords) {
            $query->where('name', 'like', '%' . $keywords . '%')
                  ->orWhere('description', 'like', '%' . $keywords . '%');
        }

        if ($adventureType) {
            $query->where('type', $adventureType);
        }

        if ($groupSize) {
            $query->where('max_group_size', '>=', $groupSize)
                  ->orWhereNull('max_group_size');
        }

        if ($startDate && $endDate) {
            $query->where('start_date', '>=', $startDate)
                  ->where('end_date', '<=', $endDate);
        }

        if ($duration) {
            $query->where('duration', $duration);
        }

        $adventures = $query->get();
        return view('booking', compact('adventures'));
    }
}