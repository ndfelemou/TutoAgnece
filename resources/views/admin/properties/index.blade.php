@extends('admin.admin')
@section('title', 'Tous les biens')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mb-4">@yield('title')</h2>

        <a href="{{ route('admin.property.create') }}" class="btn btn-sm btn-primary">
            Ajouter un bien <i class="bi bi-plus"></i>
        </a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Surface</th>
                <th>Prix</th>
                <th>Ville</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($properties as $property)
                <tr>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->surface }}m²</td>
                    <td>{{ number_format($property->price, thousands_separator: ' ') }} GNF</td>
                    <td>{{ $property->city }}</td>
                    <td >
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.property.edit', $property) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.property.destroy', $property) }}" method="post">
                                @csrf
                                @method("delete")
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $properties->links() }}
@endsection
