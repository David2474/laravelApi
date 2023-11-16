<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&family=Ysabeau+SC&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="">


<!-- <div class="my-4">
    <div class="card">
        <h2>{{ $comic->title }}</h2>
        <img src="{{ $comic->image_url }}" alt="{{ $comic->title }}">
        <p>Id: {{ $comic->comic_id }}</p>
        <p>{{ $comic->description }}</p>
        <p>Autor: {{ $comic->author }}</p>
    </div>  font-[orbitron]
</div> -->
    

<div class="bg-gray-900">
  <div class="pt-6">
    <nav aria-label="Breadcrumb">
      <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <li>
          <div class="flex items-center">
            <a href="#" class="font-[orbitron] text-2xl mr-2 font-bold text-white">COMIC: {{$comic->title}}</a>
          </div>
        </li>
      </ol>
    </nav>

    <!-- Image gallery -->
    <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
      <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block">
        <img src="{{ $comic->image_url }}" alt="{{ $comic->title }}" class="h-full w-full object-cover object-center">
      </div>
      <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
        <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
          <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-01.jpg" alt="Model wearing plain black basic tee." class="h-full w-full object-cover object-center">
        </div>
        <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
          <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg" alt="Model wearing plain gray basic tee." class="h-full w-full object-cover object-center">
        </div>
      </div>
      <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
        <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-featured-product-shot.jpg" alt="Model wearing plain white basic tee." class="h-full w-full object-cover object-center">
      </div>
    </div>

    <!-- Product info -->
    <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
      <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
        <h1 class="text-2xl font-bold tracking-tight font-[orbitron] text-white sm:text-3xl">{{$comic->title}}</h1>
      </div>

      <!-- Options -->
      <div class="mt-4 lg:row-span-3 lg:mt-0">
     
        <!-- CONTENEDOR INFO -->
          <div class="text-white">
            <h3 class="text-lg font-bold mb-3">Informacion del Comic</h3>

            <p class="">Id comic: {{$comic->comic_id}}</p>
            <p>Autor: {{ $comic->author }}</p>
          </div>
          <a type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Regresar</a>
      </div>

      <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
        <!-- Description and details -->
        <div class="text-white">
          <h3 class="sr-only">Descripcion</h3>

          <div class="space-y-6">
            <h4 class="">Descripcion</h4>
            <p class="text-base font-[Ysabeau SC]">{{$comic->description ?? 'hll'}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>