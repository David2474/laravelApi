<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\MarvelController;
use GuzzleHttp\Client; //PARA HACER LA PETICION

// Route::get('/marvel', 'MarvelController@index');
Route::get('/marvel', [MarvelController::class, 'index']);// MARCA ERROR EL CONTROLLER 


Route::get('/', function () {
    return view('welcome');
});

Route::get('marvel', function (){
    $publicKey = '1beaf379acd2064d76c39d3e5ec3aa75';
    $privateKey = '2cf759668ad28185c25df7968bf977d3117bf6b2';
    $timestamp = time();
    $hash = md5($timestamp . $privateKey . $publicKey);
    $limit = 5; // Obtener 5 cómics por página

    // Obtiene el número de página actual de la solicitud
    $page = request()->input('page', 1);

    $offset = ($page - 1) * $limit;

    $client = new Client();

    $response = $client->get("https://gateway.marvel.com/v1/public/comics", [
        'query' => [
            'ts' => $timestamp,
            'apikey' => $publicKey,
            'hash' => $hash,
            'limit' => $limit,
            'offset' => $offset,
        ],
    ]);

    
    $data = json_decode($response->getBody());
    
    $comics = $data->data->results;
    

    // dd($data);

    foreach ($comics as $comic) {
        $comic->image_url = $comic->thumbnail->path . '/portrait_uncanny.' . $comic->thumbnail->extension;
    }
    $comics = collect($comics);
    return view('marvel.index', ['comics' => $comics, 'page' => $page]);

})->name('marvel.index');
