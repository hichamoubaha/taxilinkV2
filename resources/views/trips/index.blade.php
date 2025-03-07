@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="container">
    <h1>My Trips</h1>

    <!-- Show "Book a Trips" button only for passengers -->
    @if(auth()->user()->hasRole('passenger'))
        <a href="{{ route('trips.create') }}" class="btn btn-primary mb-3">Book a Trip</a>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Pickup Time</th>
                <th>Pickup Location</th>
                <th>Destination</th>
                <th>Driver</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    @foreach($trips as $trip)
        <tr class="align-middle">
            <td class="p-3">{{ $trip->pickup_time }}</td>
            <td class="p-3">{{ $trip->pickup_location }}</td>
            <td class="p-3">{{ $trip->destination }}</td>
            <td class="p-3">{{ $trip->driver ? $trip->driver->name : 'N/A' }}</td>
            <td class="p-3">
                <span class="badge 
                    @if($trip->status === 'pending') bg-warning text-dark
                    @elseif($trip->status === 'accepted') bg-success
                    @elseif($trip->status === 'canceled') bg-danger
                    @endif">
                    {{ ucfirst($trip->status) }}
                </span>
            </td>
            <td class="p-3">
                <!-- Cancel Button (for pending or accepted trips within the allowed time frame) -->
                @if(($trip->status === 'pending' || $trip->status === 'accepted') && $trip->pickup_time > now()->addHour())
                    <form action="{{ route('trips.cancel', $trip->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                    </form>
                @endif
            </td>
        </tr>
    @endforeach
</tbody>
    </table>
</div>
@endsection