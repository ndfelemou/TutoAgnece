{{-- @php
    $type ??= 'text';
    $name ??= '';
    $class ??= null;
    $label ??= ucfirst($name);
    $value ??= '';
@endphp

<div @class(['form-groupe', $class])>
    <label for="{{ $name }}" @class(['form-label'])>{{ $label }}</label>

    @if ($type === 'textarea')
        <textarea class="form-control rounded-0 @error($name) is-invalid @enderror " name="{{ $name }}"
            id="{{ $name }}" style="resize: none" rows="5">{{ old($name, $value) }}</textarea>
    @else
        <input class="form-control rounded-0 @error($name) is-invalid @enderror " type="{{ $type }}"
            name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}">
    @endif

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<form action="{{ route('admin.property.store') }}" method="post">
    <div class="row col">
        @include('shared.input', [
            'class' => 'col',
            'label' => 'Prenom',
            'name' => 'firstname',
            'value' => $firstname,
        ])

        @include('shared.input', [
            'class' => 'col',
            'label' => 'Nom',
            'name' => 'lastname',
            'value' => $lastname,
        ])

        @include('shared.input', [
            'class' => 'col',
            'label' => 'Age',
            'name' => 'age',
            'value' => $age,
        ])
    </div>

    @include('shared.input', [
        'type' => 'textarea',
        'label' => 'Message',
        'name' => 'message',
        'value' => $message,
    ])
</form> --}}
