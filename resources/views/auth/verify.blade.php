@extends('layouts.layout-connect')

@section('content')
<h4 class="text-center mb-4">{{ __('Vérifiez votre adresse e-mail') }}</h4>

@if (session('resent'))
    <div class="alert alert-success" role="alert">
        {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
    </div>
@endif

{{ __('Avant de continuer, veuillez vérifier votre courrier électronique pour un lien de vérification.') }}
{{ __('Si vous n'avez pas reçu l'e-mail') }},
<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('cliquez ici pour en demander un autre') }}</button>.
</form>
@endsection
