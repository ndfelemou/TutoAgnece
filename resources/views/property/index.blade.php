@extends('base')
@section('title', 'Tous nos biens')
@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <div class="row">
            <form action="" method="get" class="container d-flex gap-2">
                <input type="number" name="surface" placeholder="Surface minimun" class="form-control rounded-0"
                    value="{{ $input['surface'] ?? '' }}">

                <input type="number" name="rooms" placeholder="Nombre de pièce minimun" class="form-control rounded-0"
                    value="{{ $input['rooms'] ?? '' }}">

                <input type="number" name="price" placeholder="Budget max" class="form-control rounded-0"
                    value="{{ $input['price'] ?? '' }}">

                <input name="title" placeholder="Mot clef" class="form-control rounded-0"
                    value="{{ $input['title'] ?? '' }}">

                <button type="submit" class="btn btn-sm btn-primary flex-grow-0 rounded-0 w-25">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @forelse ($properties as $property)
                <div class="col-3">
                    @include('property.card')
                </div>
            @empty
                <div class="col">
                    <h5 class="text-danger text-center">Aucun bien ne correpond à votre recherche.</h5>
                </div>
            @endforelse
        </div>

        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>

@endsection
