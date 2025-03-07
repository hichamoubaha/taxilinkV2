@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservations</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pickup Time</th>
                <th>Pickup Location</th>
                <th>Destination</th>
                <th>Passenger</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->pickup_time }}</td>
                    <td>{{ $reservation->pickup_location }}</td>
                    <td>{{ $reservation->destination }}</td>
                    <td>{{ $reservation->passenger ? $reservation->passenger->name : 'N/A' }}</td>
                    <td>{{ ucfirst($reservation->status) }}</td>
                    <td>
                        @if($reservation->status === 'pending')
                            <div class="d-flex">
                                <form action="{{ route('reservations.update', $reservation->id) }}" method="POST" class="d-inline me-2">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="accepted">
                                    <button type="submit" class="btn btn-success btn-sm">Accept</button>
                                </form>
                                <form action="{{ route('reservations.update', $reservation->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="canceled">
                                    <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                </form>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<!--resrvation-->