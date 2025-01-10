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
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id('i_pk_id');
            $table->unsignedInteger('i_fk_id_empleado');
            $table->unsignedInteger('i_fk_id_equipo');
            $table->timestamps();

            $table->foreign('i_fk_id_empleado')->references('i_pk_id')->on('empleados')->onDelete('cascade');
            $table->foreign('i_fk_id_equipo')->references('i_pk_id')->on('equipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaciones');
    }
};
