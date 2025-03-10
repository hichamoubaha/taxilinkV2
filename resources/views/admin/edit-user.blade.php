@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Éditer l'utilisateur</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="role">Rôle</label>
            <select name="role" class="form-control">
                <option value="driver" {{ $user->role === 'driver' ? 'selected' : '' }}>Chauffeur</option>
                <option value="passenger" {{ $user->role === 'passenger' ? 'selected' : '' }}>Passager</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection