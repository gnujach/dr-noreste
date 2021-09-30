<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'municipio_id', 'puesto_id', 'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
    public function puesto()
    {
        return $this->belongsTo(Puesto::class);
    }
}
