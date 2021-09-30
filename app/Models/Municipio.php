<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','estado_id','municipio_id'];
    public function casos()
    {
        return $this->hasMany(Caso::class);
    }
}
