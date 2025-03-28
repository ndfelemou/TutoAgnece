<div class="mt-5">
    <div {{ $attributes->merge(['class' => "alert alert-$type"]) }}>
        {{ $prefix }} {{ $slot }}
    </div>
</div>
