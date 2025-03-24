@extends('admin.admin')
@section('title', $property->exists ? 'Editer un bien' : 'Créer un bien')
@section('content')
    <h1>@yield('title')</h1>
    <hr class="border-primary">

    <form class="vstack gap-2"
        action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post">
        @csrf
        @method($property->exists ? 'put' : 'post')

        {{-- Inputs --}}
        <div class="border p-2 rounded-2">
            <div class="row">
                @include('shared.input', [
                    'class' => 'col',
                    'label' => 'Titre',
                    'name' => 'title',
                    'value' => $property->title,
                ])
                <div class="col row">
                    @include('shared.input', [
                        'class' => 'col',
                        'label' => 'Surface',
                        'name' => 'surface',
                        'value' => $property->surface,
                    ])

                    @include('shared.input', [
                        'class' => 'col',
                        'label' => 'Prix',
                        'name' => 'price',
                        'value' => $property->price,
                    ])
                </div>
            </div>

            @include('shared.input', [
                'type' => 'textarea',
                'name' => 'description',
                'value' => $property->description,
            ])

            <div class="row">
                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'rooms',
                    'label' => 'Pièces',
                    'value' => $property->rooms,
                ])
                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'bedrooms',
                    'label' => 'Chambres',
                    'value' => $property->bedrooms,
                ])

                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'floor',
                    'label' => 'Etage',
                    'value' => $property->floor,
                ])
            </div>

            <div class="row">
                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'address',
                    'label' => 'Adresse',
                    'value' => $property->address,
                ])
                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'city',
                    'label' => 'Ville',
                    'value' => $property->city,
                ])

                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'postal_code',
                    'label' => 'Code postal',
                    'value' => $property->postal_code,
                ])
            </div>

            @include('shared.select', [
                'name' => 'options',
                'label' => 'Options',
                'value' => $property->options()->pluck('id'),
                'multiple' => true,
            ])

            @include('shared.checkbox', [
                'name' => 'sold',
                'label' => 'Vendu',
                'value' => $property->sold,
                'options' => $options,
            ])

            {{-- Buttons --}}
            <hr>
            <div class="mt-2">
                <button type="submit" class="btn btn-sm btn-primary">
                    @if ($property->exists)
                        Modifier le bien <i class="bi bi-pencil-square"></i>
                    @else
                        Enregistrer le bien <i class="bi bi-check2-all"></i>
                    @endif
                </button>
            </div>
        </div>
    </form>

    {{-- <div class="row">
        <div class="col-md-8">
            <form action="" method="post"></form>
        </div>
    </div> --}}
@endsection
