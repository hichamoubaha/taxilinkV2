@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Driver Availability</h1>
    <form action="{{ route('admin.availabilities.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="driver_id">Driver</label>
            <select name="driver_id" class="form-control" required>
                @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="available_from">Available From</label>
            <input type="datetime-local" name="available_from" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="available_to">Available To</label>
            <input type="datetime-local" name="available_to" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create Availability</button>
    </form>
</div>
@endsection