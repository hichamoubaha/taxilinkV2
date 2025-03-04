@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Availabilities</h1>
    <a href="{{ route('availabilities.create') }}" class="btn btn-primary mb-3">Add Availability</a>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Available From</th>
                <th>Available To</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($availabilities as $availability)
                <tr class="align-middle">
                    <td class="p-3">{{ $availability->available_from }}</td>
                    <td class="p-3">{{ $availability->available_to }}</td>
                    <td class="p-3">
                        <a href="{{ route('availabilities.edit', $availability->id) }}" class="btn btn-warning btn-sm me-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('availabilities.destroy', $availability->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection