@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px; margin-bottom: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                <div class="card-header" style="background-color: #ffb800; color: white; border-radius: 10px 10px 0 0;">
                    <h3 class="m-0 p-2 text-center"><i class="fas fa-user-plus me-2"></i>{{ __('Inscription') }}</h3>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold"><i class="fas fa-user me-2"></i>{{ __('Nom Complet') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="padding: 0.8rem; border: 1px solid #e1e1e1; border-radius: 5px;">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Email. -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold"><i class="fas fa-envelope me-2"></i>{{ __('Adresse Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="padding: 0.8rem; border: 1px solid #e1e1e1; border-radius: 5px;">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold"><i class="fas fa-lock me-2"></i>{{ __('Mot de Passe') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="padding: 0.8rem; border: 1px solid #e1e1e1; border-radius: 5px;">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label fw-bold"><i class="fas fa-check-circle me-2"></i>{{ __('Confirmer Mot de Passe') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" style="padding: 0.8rem; border: 1px solid #e1e1e1; border-radius: 5px;">
                        </div>

                        <!-- Profile Photo -->
                        <div class="mb-3">
                            <label for="profile_photo" class="form-label fw-bold"><i class="fas fa-camera me-2"></i>{{ __('Photo de Profil') }}</label>
                            <input id="profile_photo" type="file" class="form-control @error('profile_photo') is-invalid @enderror" name="profile_photo" required style="padding: 0.8rem; border: 1px solid #e1e1e1; border-radius: 5px;">
                            @error('profile_photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label fw-bold"><i class="fas fa-phone me-2"></i>{{ __('Numéro de Téléphone') }}</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="+212 6XX XXXXXX" style="padding: 0.8rem; border: 1px solid #e1e1e1; border-radius: 5px;">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label fw-bold"><i class="fas fa-map-marker-alt me-2"></i>{{ __('Adresse') }}</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required style="padding: 0.8rem; border: 1px solid #e1e1e1; border-radius: 5px;">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div class="mb-4">
                            <label for="role" class="form-label fw-bold"><i class="fas fa-user-tag me-2"></i>{{ __('S\'inscrire en tant que') }}</label>
                            <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required style="padding: 0.8rem; border: 1px solid #e1e1e1; border-radius: 5px;">
                                <option value="passenger">{{ __('Passager') }}</option>
                                <option value="driver">{{ __('Chauffeur') }}</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn" style="background-color: #ffb800; color: white; padding: 0.8rem; border-radius: 50px; font-weight: 600; transition: background-color 0.3s, transform 0.3s;">
                                <i class="fas fa-sign-in-alt me-2"></i>{{ __('S\'inscrire') }}
                            </button>
                        </div>
                        
                        <div class="text-center mt-3">
                            <p class="mb-0">{{ __('Vous avez déjà un compte?') }} <a href="{{ route('login') }}" style="color: #1a73e8; text-decoration: none; font-weight: 600;">{{ __('Connexion') }}</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn:hover {
        background-color: #e6a700 !important;
        transform: translateY(-2px);
    }
    
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }
    
    .form-control:focus {
        border-color: #ffb800;
        box-shadow: 0 0 0 0.25rem rgba(255, 184, 0, 0.25);
    }
</style>
@endsection