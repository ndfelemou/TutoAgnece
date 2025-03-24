@extends('admin.admin')
@section('title', $option->exists ? 'Editer une option' : 'Créer une option')
@section('content')
    <h1>@yield('title')</h1>
    <hr class="border-primary">

    {{-- formulaire --}}
    <form class="vstack gap-2" action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}"
        method="post">
        @csrf
        @method($option->exists ? 'put' : 'post')

        {{-- Inputs --}}
        <div class="border p-2 rounded-2">
            @include('shared.input', ['name' => 'name', 'label' => 'Nom', 'value' => $option->name])

            {{-- Buttons --}}
            <hr>
            <div class="mt-2">
                <button type="submit" class="btn btn-sm btn-primary">
                    @if ($option->exists)
                        Modifier l'option <i class="bi bi-pencil-square"></i>
                    @else
                        Enregistrer l'option <i class="bi bi-check2-all"></i>
                    @endif
                </button>
            </div>
        </div>
    </form>
@endsection
