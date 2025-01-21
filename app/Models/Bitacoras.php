<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitacoras extends Model
{
    //
    protected $fillable = [
        'servicios_id',
        'fecha_visita',
        'hora_entrada',
        'hora_salida',
        'state'
    ];

    public function servicios(){
        return $this->belongsTo(Servicios::class, 'servicios_id');  // Asegúrate de que 'proveedor_id' es el nombre correcto de la columna de la relación
    }
}
