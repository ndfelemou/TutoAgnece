@extends('base')
@section('title', $property->title)
@section('content')
    <div class="container mt-4">
        <h1>{{ $property->title }}</h1>
        <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m²</h2>

        <div class="text-primary fw-bold" style="font-size: 4rem;">
            {{ number_format($property->price, thousands_separator: ' ') }} GNF
        </div>

        <hr>

        <div class="mt-4">
            <h4>Interesser par ce bien ?</h4>

            @include('shared.flash')

            <form action="{{ route('property.contact', $property) }}" method="post" class="vstack gap-3">
                @csrf

                <div class="row">
                    @include('shared.input', [
                        'class' => 'col',
                        'name' => 'firstname',
                        'label' => 'Prénom',
                    ])
                    @include('shared.input', [
                        'class' => 'col',
                        'name' => 'lastname',
                        'label' => 'Nom',
                    ])
                </div>
                <div class="row">
                    @include('shared.input', [
                        'class' => 'col',
                        'name' => 'phone',
                        'label' => 'Téléphone',
                    ])
                    @include('shared.input', [
                        'class' => 'col',
                        'name' => 'email',
                        'label' => 'Email',
                        'type' => 'email',
                    ])
                </div>
                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'message',
                    'label' => 'Votre Message',
                    'type' => 'textarea',
                ])

                <div>
                    <button type="submit" class="btn  btn-primary rounded-0">NOUS CONTACTER</button>
                </div>
            </form>

        </div>

        <div class="mt-4">
            <p>{!! nl2br($property->description) !!}</p>
            <div class="row">
                <div class="col-8">
                    <h2 class="text-primary">Caractéristiques</h2>
                    <table class="table table-stripe table-hover">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }} m²</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{ $property->rooms }} @if ($property->rooms >= 2)
                                    pièces
                                @else
                                    pièce
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{ $property->bedrooms }}
                                @if ($property->bedrooms >= 2)
                                    chambres
                                @else
                                    chambre
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Etage</td>
                            <td>{{ $property->floor ?: 'Rez de chaussé' }}</td>
                        </tr>

                        <tr>
                            <td>Localisation</td>
                            <td>
                                {{ $property->address }} -
                                {{ $property->city }} (BP : {{ $property->postal_code }})
                            </td>
                        </tr>

                        <tr>
                            <td>Disponibilité</td>
                            <td>
                                @if ($property->sold == 0)
                                    <span class="text-success">Disponible</span>
                                @else
                                    <span class="text-danger">Vendu</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2 class="text-primary">Spécificités</h2>
                    <ul class="list-group rounded-0">
                        @foreach ($property->options as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
