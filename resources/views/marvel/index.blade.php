<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMICS</title>
    
    @vite('resources/css/app.css')
</head>
<body class="bg-yellow-400">

<nav class="bg-sky-950">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <span class="self-center text-2x1 font-semibold whitespace-nowrap text-white">Marvel Comics</span>

        <button data-collapse-toggle="mega-menu-full" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mega-menu-full" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

    
  </div>
</nav>


<section class="flex flex-wrap justify-evenly">

    <div class="my-4">
        @foreach ($comics as $comic)
            <div>
                <h2>{{ $comic->title }}</h2>
                <img src="{{ $comic->image_url }}" alt="{{ $comic->title }}">
                <p>{{ $comic->description }}</p>
                <p>{{ $comic->author }}</p>
                <a href="{{ route('marvel.detalle', ['comic' => $comic->id]) }}" class="">Detalles</a>
                {{-- Otros detalles del cómic --}}
            </div>
        @endforeach

        <div class="mt-4">
        {{ $comics->links() }} <!-- Esto imprimirá los enlaces de paginación -->
    </div>
    </div>

</section>
    <footer class="bg-sky-950 text-white h-9 mt-5 flex justify-center items-center">
        <p>© 2023 MARVEL</p>
    </footer>
</body>
</html>
