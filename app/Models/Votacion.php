<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votacion extends Model
{
    use HasFactory;
    protected $table = 'votaciones';
    protected $fillable = [
        'candidato_id',
        'user_id',
        'puntuacion',
        'comentarios',
        'ip_address'
    ];
    
    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }
    
}
