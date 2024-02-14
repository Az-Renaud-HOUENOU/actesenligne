@extends('layouts.layout-connect')

@section('content')
                                    <!-- <div class="pt-4 pb-2">
                                        <img src="{{asset('images/logoifri.jpg')}}" width="400px"height="200px" alt="">
                                    </div> 
                                    <i class='uil uil-user text-secondary fs-5'></i>  <i class='uil uil-lock text-secondary fs-5'></i>-->
                                    <h4 class="text-center mb-4">{{ __('Sign in your account') }}</h4>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email" class="form-label"><strong>{{ __('Addresse Email') }}</strong></label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
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
                                            <div class="form-group">
                                                <div class="form-check ml-2">
                                                    <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">{{ __('Se souvenir de moi') }}</label>
                                                </div>
                                            </div>
                                            @if (Route::has('password.request'))
                                                <div class="form-group">
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Mot de Passe Oublié?') }}
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">{{ __('Se connecter') }}</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a></p>
                                    </div>
@endsection
