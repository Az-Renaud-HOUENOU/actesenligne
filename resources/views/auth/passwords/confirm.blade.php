@extends('layouts.layout-connect')

@section('content')
<h4 class="text-center mb-4">{{ __('Confirmez le Mot de Passe') }}</h4>

{{ __('Veuillez confirmer votre mot de passe avant de continuer.') }}

<form method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <div class="form-group">
        <label for="password" class="form-label"><strong>{{ __('Mot de Passe') }}</strong></label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-row d-flex justify-content-between mt-4 mb-2">
        @if (Route::has('password.request'))
            <div class="form-group">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Mot de Passe Oublié?') }}
                </a>
            </div>
        @endif
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block">{{ __('Confirmer le Mot de Passe') }}</button>
    </div>
</form>
@endsection
