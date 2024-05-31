@extends('layouts.layout-connect')

@section('content')
<h4 class="text-center mb-4">{{ __('Réinitialiser le mot de passe') }}</h4>
<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group">
        <label for="email" class="form-label"><strong>{{ __('Addresse Email') }}</strong></label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password" class="form-label"><strong>{{ __('Nouveau Mot de Passe') }}</strong></label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password-confirm" class="form-label"><strong>{{ __('Confirmer le Mot de Passe') }}</strong></label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary btn-block">{{ __('Réinitialiser le mot de passe') }}</button>
    </div>
</form>
@endsection
