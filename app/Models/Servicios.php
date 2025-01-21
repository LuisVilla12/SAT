<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    //
    protected $fillable = [
        'matricula',
        'name',
        'lastname_p',
        'lastname_m',
        'company',
        'state',
    ];

    public function visita()
    {
        return $this->hasMany(Bitacoras::class);
    }
}
