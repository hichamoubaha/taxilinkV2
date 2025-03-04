@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Book a Trip with {{ $driver->name }}</h1>

    <form action="{{ route('trips.store') }}" method="POST">
        @csrf
        <input type="hidden" name="driver_id" value="{{ $driver->id }}">

        <div class="mb-3">
            <label for="pickup_time" class="form-label">Pickup Time</label>
            <input type="datetime-local" name="pickup_time" id="pickup_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="pickup_location" class="form-label">Pickup Location</label>
            <input type="text" name="pickup_location" id="pickup_location" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="destination" class="form-label">Destination</label>
            <input type="text" name="destination" id="destination" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Book Trip</button>
    </form>
</div>
@endsection