<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cct extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'cct', 'nombre_ct', 'descripcion_turno', 'zona_escolar', 'sector', 'tipo_escuela', 'multigrado', 'bidocente', 'unitaria',
        'domicilio_geografico', 'clave_localidad', 'descripcion_localidad', 'clave_municipio', 'descripcion_municipio', 'nombre_director'
    ];
    public function casos()
    {
        return $this->hasMany(Caso::class);
    }
}
