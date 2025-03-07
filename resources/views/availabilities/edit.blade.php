@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Availability</h1>
    <form action="{{ route('availabilities.update', $availability->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="available_from" class="form-label">Available From</label>
            <input type="datetime-local" name="available_from" id="available_from" class="form-control" value="{{ $availability->available_from }}" required>
        </div>
        <div class="mb-3">
            <label for="available_to" class="form-label">Available To</label>
            <input type="datetime-local" name="available_to" id="available_to" class="form-control" value="{{ $availability->available_to }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Availability</button>
    </form>
</div>
@endsection

<!--edit-->