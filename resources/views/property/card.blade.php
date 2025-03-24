<div class="card rounded-1 mb-3">
    <div class="card-body">
        <h5 class="cart-title">
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">
                {{ $property->title }}
            </a>
            <hr>
            @if ($property->sold == 0)
                <small class="mt-1 text-success">Disponible</small>
            @else
                <small class="mt-1 text-danger">Vendu</small>
            @endif
        </h5>

        <p class="card-text">{{ $property->surface }}m² - {{ $property->city }} ({{ $property->postal_code }})</p>

        <div class="text-primary fw-bold" style="font-size: 1.4rem;">
            {{ number_format($property->price, thousands_separator: ' ') }} GNF</div>
    </div>
</div>
