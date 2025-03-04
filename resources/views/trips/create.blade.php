@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Book a Trip</h1>

    <!-- Filter Form -->
    <form action="{{ route('trips.create') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" id="location" class="form-control" placeholder="Enter location" value="{{ request('location') }}">
            </div>
            <div class="col-md-4">
                <label for="availability" class="form-label">Availability</label>
                <input type="datetime-local" name="availability" id="availability" class="form-control" value="{{ request('availability') }}">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Drivers List -->
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Driver Name</th>
                <th>Location</th>
                <th>Availability</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drivers as $driver)
                <tr class="align-middle">
                    <td class="p-3">{{ $driver->name }}</td>
                    <td class="p-3">{{ $driver->address }}</td>
                    <td class="p-3">
                        @foreach($driver->availabilities as $availability)
                            <div>
                                {{ $availability->available_from }} - {{ $availability->available_to }}
                            </div>
                        @endforeach
                    </td>
                    <td class="p-3">
                        <a href="{{ route('trips.book', $driver->id) }}" class="btn btn-primary btn-sm">Book</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection