@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Trip Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pickup Time: {{ $trip->pickup_time }}</h5>
            <p class="card-text">Pickup Location: {{ $trip->pickup_location }}</p>
            <p class="card-text">Destination: {{ $trip->destination }}</p>
            <p class="card-text">Driver: {{ $trip->driver->name ?? 'Not Assigned' }}</p>
            <p class="card-text">Status: {{ ucfirst($trip->status) }}</p>
            <a href="{{ route('trips.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
<!--show-->