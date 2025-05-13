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
