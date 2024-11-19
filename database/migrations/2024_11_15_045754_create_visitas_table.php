<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name_persona');
            $table->foreignId('proveedors_id')->constrained()->onDelete('cascade');
            $table->string('area');
            $table->string('motivo_visita');
            $table->date('fecha_visita');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->string('comentarios');
            $table->integer('state');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitas');
    }
};
