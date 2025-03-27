@extends('base')
@section('title', 'S\'inscrire')
@section('content')
    <div class="mt-4 container">
        <h1>@yield('title')</h1>

        @include('shared.flash')
        <form action="{{ route('register') }}" method="post" class="vstack gap-3">
            @csrf

            @include('shared.input', ['class' => 'col', 'label' => 'Prenom et Nom', 'name' => 'name'])
            @include('shared.input', ['class' => 'col', 'label' => 'Email', 'name' => 'email'])
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Mot de passe',
                'name' => 'password',
                'type' => 'password',
            ])
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Confirmer le mot de passe',
                'name' => 'password_confirmation',
                'type' => 'password',
            ])
            <div>
                <button type="submit" class="btn btn-sm btn-primary"> @yield('title') <i class="bi bi-lock"></i> </button>
            </div>
        </form>
    </div>
@endsection
