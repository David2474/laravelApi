<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;
    protected $table = 'comics';
    protected $fillable = ['title', 'comic_id', 'description', 'image_url', 'author'];

    /**
     * Update or create a comic record in the database.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function updateOrCreate(array $attributes, array $values = [])
    {
        // Log para verificar los datos antes de la actualización o creación
        Log::info('Datos antes de updateOrCreate: ' . json_encode($attributes));

        return parent::updateOrCreate($attributes, $values);
    }

}
