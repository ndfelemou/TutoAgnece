@extends('base')
@section('title', 'Se connecter')
@section('content')
    <div class="mt-4 container">
        <h1>@yield('title')</h1>

        @include('shared.flash')
        <form action="{{ route('login') }}" method="post" class="vstack gap-3">
            @csrf

            @include('shared.input', ['class' => 'col', 'label' => 'Email', 'name' => 'email'])
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Mot de passe',
                'name' => 'password',
                'type' => 'password',
            ])

            <div>
                <button type="submit" class="btn btn-sm btn-primary"> @yield('title') <i class="bi bi-lock"></i> </button>
            </div>
        </form>
    </div>
@endsection
