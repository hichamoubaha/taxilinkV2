<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::with('passenger', 'driver')->get();
        return view('admin.trips.index', compact('trips'));
    }

    public function show(Trip $trip)
    {
        return view('admin.trips.show', compact('trip'));
    }

    public function update(Request $request, Trip $trip)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,completed,canceled',
        ]);

        $trip->update(['status' => $request->status]);

        return redirect()->route('admin.trips.index')->with('success', 'Trip status updated successfully!');
    }
}