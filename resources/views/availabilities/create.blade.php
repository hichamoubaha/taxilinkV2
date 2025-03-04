@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Availability</h1>
    <form action="{{ route('availabilities.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="available_from" class="form-label">Available From</label>
            <input type="datetime-local" name="available_from" id="available_from" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="available_to" class="form-label">Available To</label>
            <input type="datetime-local" name="available_to" id="available_to" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Availability</button>
    </form>
</div>
@endsection