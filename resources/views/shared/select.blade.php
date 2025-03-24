@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp
<div @class(['form-group', $class])>
    <label for="{{ $name }}" class="fw-bold">{{ $label }}</label>

    <select class="form-control rounded-0 @error($name) is-invalid @enderror" name="{{ $name }}[]"
        id="{{ $name }}" multiple>
        @foreach ($options as $k => $v)
            <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
