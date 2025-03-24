@extends('base')
@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence lorem ipsum</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Id veritatis non vitae aliquam maxime aspernatur a quam corrupti sapiente culpa consectetur error,
                hic quia provident neque iste maiores! Voluptatibus, sint!
            </p>
        </div>
    </div>

    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col-md-4 col-lg-3 col-sm-6">
                    @include('property.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection
