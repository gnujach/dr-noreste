<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    public function casos()
    {
        return $this->hasMany(Caso::class);
    }
}
