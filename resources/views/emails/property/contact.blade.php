<x-mail::message>
    # Nouvelle demande de contact

    Une nouvelle de mande contact a été fait pour le bien
<a class="btn btn-sm btn-primary" href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a>

- Prénom : {{ $data['firstname'] }}
- Nom : {{ $data['lastname'] }}
- Téléphone : {{ $data['phone'] }}
- Email : {{ $data['email'] }}

**Message :** <br>
    {{ $data['message'] }}
</x-mail::message>
