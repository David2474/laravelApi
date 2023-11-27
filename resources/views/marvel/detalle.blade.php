<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$comic->title}}</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&family=Ysabeau+SC&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-900">


<div class="bg-gray-900">
  <div class="pt-6">
    <nav aria-label="Breadcrumb">
      <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <li>
          <div class="flex items-center">
            <a href="#" class="font-[Ysabeau SC] text-2xl mr-2 font-bold text-white">COMIC: {{$comic->title}}</a>
          </div>
        </li>
      </ol>
    </nav>

    <!-- Product info -->
    <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
      <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
        
      </div>

      <!-- Options -->
      <div class="mt-4 lg:row-span-3 lg:mt-0">
        <!-- CONTENEDOR INFO -->
          <div class="text-white">
            <h3 class="text-lg font-bold mb-3">Informacion del Comic</h3>

            <p class="">Id comic: {{$comic->comic_id}}</p>
            <p>Autor: {{ $comic->author }}</p>
          </div>
          <a type="submit" href="{{ route('marvel.index') }}" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Regresar</a>
      </div>

      <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
        <!-- Description and details -->
        <div class="text-white">
          <h3 class="sr-only">Descripcion</h3>

          <div class="space-y-6">
            <h4 class="text-lg font-[Ysabeau SC]">Descripcion</h4>
            <p class="text-lg font-[orbitron]">{{$comic->description ?? 'hll'}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>