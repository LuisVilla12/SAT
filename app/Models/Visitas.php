<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitas extends Model
{
    //
    protected $fillable = [
        'name_persona',
        'proveedors_id',
        'area',
        'motivo_visita',
        'fecha_visita',
        'hora_entrada',
        'hora_salida',
        'comentarios',
        'state'
    ];

    public function proveedors()
{
    return $this->belongsTo(Proveedors::class, 'proveedors_id');  // Asegúrate de que 'proveedor_id' es el nombre correcto de la columna de la relación

}

}
