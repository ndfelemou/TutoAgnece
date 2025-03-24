@extends('admin.admin')
@section('title', 'Toutes les options')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mb-4">@yield('title')</h2>

        <a href="{{ route('admin.option.create') }}" class="btn btn-sm btn-primary">
            Ajouter une option <i class="bi bi-plus"></i>
        </a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($options as $key => $option)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $option->name }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.option.edit', $option) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.option.destroy', $option) }}" method="post">
                                @csrf
                                @method('delete')
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

    {{ $options->links() }}
@endsection
