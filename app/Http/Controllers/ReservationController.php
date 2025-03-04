<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Trip::where('driver_id', auth()->id())->get();
        return view('reservations.index', compact('reservations'));
    }

    public function update(Request $request, Trip $reservation)
    {
        $request->validate([
            'status' => 'required|in:accepted,canceled',
        ]);

        $reservation->update(['status' => $request->status]);

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully!');
    }
}

//reservation 