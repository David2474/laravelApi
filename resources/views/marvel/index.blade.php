@foreach ($comics as $comic)
    <h2>{{ $comic->title }}</h2>
    <img src="{{ $comic->thumbnail->path }}/portrait_uncanny.{{ $comic->thumbnail->extension }}" alt="{{ $comic->title }}">
    <p>{{ $comic->description }}</p>
@endforeach

<div class="my-4">
    <div class="flex justify-between">
        @if ($page > 1)
            <a href="{{ route('marvel.index', ['page' => $page - 1]) }}" class="text-blue-600 hover:text-blue-800">Anterior</a>
        @endif

        <a href="{{ route('marvel.index', ['page' => $page + 1]) }}" class="text-blue-600 hover:text-blue-800">Siguiente</a>
    </div>
</div>
