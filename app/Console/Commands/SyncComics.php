<?php
// <!-- app/Console/Commands/SyncComics.php -->

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\Log;
use App\Models\Comic; // Asegúrate de importar el modelo Comic


class SyncComics extends Command{
    
    protected $signature = 'sync-comics';
    protected $description = 'Synchronize comics from Marvel API to the database';

    public function handle(){


        $publicKey = '1beaf379acd2064d76c39d3e5ec3aa75';
        $privateKey = '2cf759668ad28185c25df7968bf977d3117bf6b2';
        $timestamp = time();
        $hash = md5($timestamp . $privateKey . $publicKey);
        $limit = 100; // La API de Marvel tiene un límite máximo por solicitud, puedes establecerlo según tus necesidades
        $totalComics = 500; // Número total de cómics que deseas obtener
        $offset = 0;
        
        $client = new Client();
        
        while ($offset < $totalComics) {
            $response = $client->get('https://gateway.marvel.com/v1/public/comics', [
                'query' => [
                    'ts'     => $timestamp,
                    'apikey' => $publicKey,
                    'hash'   => urlencode($hash),
                    'limit' => min($limit, $totalComics - $offset),
                    'offset' => $offset,
                ],
            ]);

            $marvelData = json_decode($response->getBody(), true)['data']['results'];
            // Ahora puedes iterar sobre $marvelData y agregar los cómics a la base de datos
            $offset += $limit;
        }

        // Itera sobre los datos y agrega cada cómic a la base de datos
        foreach ($marvelData as $comicData) {
            Log::createLog('Se sincronizó el cómic: ' . $comicData['title']);
        }

         // Itera sobre los datos y agrega cada cómic a la base de datos
        foreach ($marvelData as $comicData) {
        $existingComic = Comic::where('comic_id', $comicData['id'])->first();
    
        if (!$existingComic) {
            $comic = new Comic();
            $comic->comic_id = $comicData['id'];
            $comic->title = $comicData['title'];
            $comic->description = $comicData['description'] ?? null;
            // Agrega el nombre del autor a la columna 'author'
            $comic->author = $comicData['creators']['items'][0]['name'] ?? 'Desconocido';

    
            // Si el cómic tiene imágenes, agrega la primera imagen a la columna 'image_url'
            if (isset($comicData['images'][0]['path']) && isset($comicData['images'][0]['extension'])) {
                $comic->image_url = $comicData['images'][0]['path'] . '/portrait_uncanny.' . $comicData['images'][0]['extension'];
            }
    
            $comic->save();
        }
    }

        $this->info('Comando ejecutado con éxito.');

    }
}
