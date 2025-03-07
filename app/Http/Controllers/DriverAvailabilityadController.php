<?php

namespace App\Http\Controllers;

use App\Models\DriverAvailability;
use Illuminate\Http\Request;

class DriverAvailabilityController extends Controller
{
    public function index()
    {
        $availabilities = DriverAvailability::with('driver')->get();
        return view('admin.availabilities.index', compact('availabilities'));
    }

    public function create()
    {
        return view('admin.availabilities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'driver_id' => 'required|exists:users,id',
            'available_from' => 'required|date',
            'available_to' => 'required|date|after:available_from',
        ]);

        DriverAvailability::create($request->all());

        return redirect()->route('admin.availabilities.index')->with('success', 'Availability added successfully!');
    }

    public function edit(DriverAvailability $availability)
    {
        return view('admin.availabilities.edit', compact('availability'));
    }

    public function update(Request $request, DriverAvailability $availability)
    {
        $request->validate([
            'available_from' => 'required|date',
            'available_to' => 'required|date|after:available_from',
        ]);

        $availability->update($request->all());

        return redirect()->route('admin.availabilities.index')->with('success', 'Availability updated successfully!');
    }

    public function destroy(DriverAvailability $availability)
    {
        $availability->delete();
        return redirect()->route('admin.availabilities.index')->with('success', 'Availability deleted successfully!');
    }
}
//new