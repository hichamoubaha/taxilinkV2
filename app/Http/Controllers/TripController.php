<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
{
    // Get all trips for the logged-in passenger, excluding canceled trip
    $trips = Trip::where('passenger_id', auth()->id())
        ->where('status', '!=', 'canceled') // Exclude canceled trips
        ->get();

    return view('trips.index', compact('trips'));
}

    public function create(Request $request)
{
    // Get filter inputs
    $location = $request->input('location');
    $availability = $request->input('availability');

    // Start with all drivers
    $drivers = User::role('driver');

    // Filter by location (address)
    if ($location) {
        $drivers->where('address', 'like', '%' . $location . '%');
    }

    // Filter by availabilityy
    if ($availability) {
        $drivers->whereHas('availabilities', function ($query) use ($availability) {
            $query->where('available_from', '<=', $availability)
                  ->where('available_to', '>=', $availability);
        });
    }

    // Get the filtered drivers
    $drivers = $drivers->get();

    // Pass the drivers and their availabilities to the view
    $driverAvailabilities = [];
    foreach ($drivers as $driver) {
        $driverAvailabilities[$driver->id] = $driver->availabilities;
    }

    return view('trips.create', compact('drivers', 'driverAvailabilities'));
}


    public function store(Request $request)
    {
        $request->validate([
            'pickup_time' => 'required|date',
            'pickup_location' => 'required|string',
            'destination' => 'required|string',
            'driver_id' => 'required|exists:users,id',
        ]);
    
        // Get the selected driver's availabilities
        $driver = User::findOrFail($request->driver_id);
        $availabilities = $driver->availabilities;
    
        // Check if the pickup time falls within any of the driver's availabilities
        $isValid = false;
        foreach ($availabilities as $availability) {
            if ($request->pickup_time >= $availability->available_from && $request->pickup_time <= $availability->available_to) {
                $isValid = true;
                break;
            }
        }
    
        if (!$isValid) {
            return redirect()->back()->withErrors(['pickup_time' => 'The selected pickup time is not within the driver\'s availability.']);
        }
    
        // Create the trip
        Trip::create([
            'passenger_id' => auth()->id(),
            'driver_id' => $request->driver_id,
            'pickup_time' => $request->pickup_time,
            'pickup_location' => $request->pickup_location,
            'destination' => $request->destination,
            'status' => 'pending', // Default status
        ]);
    
        return redirect()->route('trips.index')->with('success', 'Trip booked successfully!');
    }


    public function show(Trip $trip)
    {
        return view('trips.show', compact('trip'));
    }

    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect()->route('trips.index')->with('success', 'Trip canceled successfully!');
    }
    public function __construct()
{
    $this->middleware('passenger')->only(['create', 'store']);
}

public function book(User $driver)
{
    // Pass the selected driver to the booking form
    return view('trips.book', compact('driver'));
}

public function cancel(Trip $trip)
{
    // Check if the trip can be canceled (more than one hour before pickup time)
    if ($trip->pickup_time <= now()->addHour()) {
        return redirect()->route('trips.index')->with('error', 'You can only cancel a trip more than one hour before the pickup time.');
    }

    // Check if the trip is either pending or accepted
    if ($trip->status !== 'pending' && $trip->status !== 'accepted') {
        return redirect()->route('trips.index')->with('error', 'You can only cancel pending or accepted trips.');
    }

    // Update the trip status to "canceled"
    $trip->update(['status' => 'canceled']);

    return redirect()->route('trips.index')->with('success', 'Trip canceled successfully!');
}

}