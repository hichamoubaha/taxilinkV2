<?php

namespace App\Http\Controllers;

use App\Models\DriverAvailability;
use Illuminate\Http\Request;

class DriverAvailabilityController extends Controller
{
    // Show all availabilities for the logged-in driver
    public function index()
    {
        $availabilities = DriverAvailability::where('driver_id', auth()->id())->get();
        return view('availabilities.index', compact('availabilities'));
    }

    // Show the form to create a new availability
    public function create()
    {
        return view('availabilities.create');
    }

    // Store a new availability
    public function store(Request $request)
    {
        $request->validate([
            'available_from' => 'required|date',
            'available_to' => 'required|date|after:available_from',
        ]);

        DriverAvailability::create([
            'driver_id' => auth()->id(),
            'available_from' => $request->available_from,
            'available_to' => $request->available_to,
        ]);

        return redirect()->route('availabilities.index')->with('success', 'Availability added successfully!');
    }

    // Show the form to edit an availability
    public function edit(DriverAvailability $availability)
    {
        return view('availabilities.edit', compact('availability'));
    }

    // Update an availabilityy
    public function update(Request $request, DriverAvailability $availability)
    {
        $request->validate([
            'available_from' => 'required|date',
            'available_to' => 'required|date|after:available_from',
        ]);

        $availability->update([
            'available_from' => $request->available_from,
            'available_to' => $request->available_to,
        ]);

        return redirect()->route('availabilities.index')->with('success', 'Availability updated successfully!');
    }

    // Delete an availability
    public function destroy(DriverAvailability $availability)
    {
        $availability->delete();
        return redirect()->route('availabilities.index')->with('success', 'Availability deleted successfully!');
    }
}