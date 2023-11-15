<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = ['message'];

    // Otros campos que podrías agregar:
    // protected $fillable = ['message', 'user_id', 'action_type', ...];

    // También podrías agregar relaciones con otros modelos si es necesario.

    // Ejemplo de un método en el modelo para crear un nuevo registro de log
    public static function createLog($message)
    {
        return self::create(['message' => $message]);
    }
}
