<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MarvelController extends Controller{


    public function obtenerComic(){
        // Obtén los cómics de la base de datos para mostrarlos en la vista
        $comics = Comic::paginate(4);
        // dd($comics);
        return view('marvel.index', compact('comics'));
    }


    public function show($comic){
        $comic = Comic::find($comic);
        // dd($comic); 
        return view('marvel.detalle', compact('comic'));
    }
}
