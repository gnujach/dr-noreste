<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Caso extends Model
{
    use HasFactory;
    use HasUuid;
    protected $fillable = [
        'uuid', 'cct_id', 'user_id', 'rol_id', 'tipo_id', 'diagnostico_id', 'genero_id', 'nombre_pila', 'ap1', 'ap2', 'tel_contacto', 'tel_escuela', 'has_prueba',
        'nombre_reporta', 'observaciones_reporta', 'observaciones_enlace', 'has_dictamen', 'enlace_id', 'fecha_regreso',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cct()
    {
        return $this->belongsTo(Cct::class);
    }
    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }
    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
    public function diagnostico()
    {
        return $this->belongsTo(Diagnostico::class);
    }
    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
    protected $casts = [
        'fecha_regreso' => 'datetime',
    ];
}
