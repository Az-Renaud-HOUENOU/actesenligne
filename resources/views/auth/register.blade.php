@extends('layouts.layout-connect')

@section('content')
                                    <h4 class="text-center mb-4">{{ __('Inscrivez votre compte') }}</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="form-label"><strong>{{ __('Nom dutilisateur') }}</strong></label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="username">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label"><strong>{{ __('Addresse Email') }}</strong></label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="hello@example.com">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="form-label"><strong>{{ __('Mot de Passe') }}</strong></label>
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
                                            <button type="submit" class="btn btn-primary btn-block">{{ __('Sinscrire') }}</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Vous avez déjà un compte ? <a class="text-primary" href="{{ route('login') }}">Se connecter</a></p>
                                    </div>
@endsection
