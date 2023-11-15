<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-orange-600">


<div class="my-4">
    <div class="card">
        <h2>{{ $comic->title }}</h2>
        <img src="{{ $comic->image_url }}" alt="{{ $comic->title }}">
        <p>{{ $comic->description }}</p>
        <p>Autor: {{ $comic->author }}</p>
        <p>Otra información: {{ $comic->otra_propiedad }}</p>
        
        <!-- Agrega más detalles según las propiedades de tu modelo Comic -->
    </div>
</div>
    
</body>
</html>