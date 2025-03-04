@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Trips</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Passenger</th>
                <th>Driver</th>
                <th>Pickup Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trips as $trip)
            <tr>
                <td>{{ $trip->passenger->name }}</td>
                <td>{{ $trip->driver->name }}</td>
                <td>{{ $trip->pickup_time }}</td>
                <td>{{ $trip->status }}</td>
                <td>
                    <a href="{{ route('admin.trips.show', $trip) }}" class="btn btn-info">View</a>
                    <form action="{{ route('admin.trips.update', $trip) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <select name="status" onchange="this.form.submit()">
                            <option value="pending" {{ $trip->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="accepted" {{ $trip->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                            <option value="completed" {{ $trip->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="canceled" {{ $trip->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection