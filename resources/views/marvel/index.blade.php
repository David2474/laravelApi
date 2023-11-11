<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMICS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="">

<nav class="bg-sky-950">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Marvel Comics</span>

        <button data-collapse-toggle="mega-menu-full" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mega-menu-full" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

    <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
        <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
            <li>
                <a href="{{ route('marvel.index', ['page' => $page + 1]) }}"  class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-slate-300 md:p-0 md:dark:hover:text-slate-300 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Siguiente pagina</a> 
            </li>
            <li>
                @if ($page > 1)
                    <a href="{{ route('marvel.index', ['page' => $page - 1]) }}" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-slate-300 md:p-0 md:dark:hover:text-slate-300 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pagina anterior</a>
                @endif
            </li>
        </ul>
    </div>
  </div>
</nav>


<section class="flex flex-wrap justify-evenly">

    @foreach ($comics as $comic)
        <div class="rounded-xl bg-cyan-600 flex flex-col my-12 mx-9 w-3/4 sm:w-1/3 sm:h-2/3">
            <h2 class="text-lg my-3 text-center w-[100%] font-bold">{{ $comic->title }}</h2>
            <img src="{{ $comic->thumbnail->path }}/portrait_uncanny.{{ $comic->thumbnail->extension }}" alt="{{ $comic->title }}"
                class="w-3/4 h-96 self-center rounded-md"
            >
            <div class="flex justify-between text-base font-semibold mx-4 sm:flex-col sm:mx-8 my-10">
                <p class="">Id del comic: {{ $comic->id }}</p>
                <p>Paginas: {{ $comic->pageCount }}</p>
            </div>
       
        </div>
    @endforeach
    
</section>
    <footer class="bg-sky-950 text-white h-9 mt-5 flex justify-center items-center">
        <p>© 2023 MARVEL</p>
    </footer>
    
</body>
</html>
