<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedors extends Model
{
    //
    protected $fillable = [
        'name_persona',
        'name_company',
        'type',
        'state'
    ];

}

