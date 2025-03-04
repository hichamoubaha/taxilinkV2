@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Driver Availabilities</h1>
    <a href="{{ route('admin.availabilities.create') }}" class="btn btn-primary">Add Availability</a>
    <table class="table">
        <thead>
            <tr>
                <th>Driver</th>
                <th>Available From</th>
                <th>Available To</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($availabilities as $availability)
            <tr>
                <td>{{ $availability->driver->name }}</td>
                <td>{{ $availability->available_from }}</td>
                <td>{{ $availability->available_to }}</td>
                <td>
                    <a href="{{ route('admin.availabilities.edit', $availability) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.availabilities.destroy', $availability) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection