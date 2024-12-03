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
        Schema::create('equipo', function (Blueprint $table) {
            $table->id('i_pk_id');
            $table->string('vc_nombre_equipo', 100);
            $table->text('t_componentes_generales')->nullable();
            $table->string('vc_serial_equipo', 100)->unique();
            $table->string('vc_marca', 100);
            $table->string('vc_modelo', 100)->nullable();
            $table->date('d_fecha_compra')->nullable();
            $table->decimal('dec_costo_equipo', 10, 2)->nullable();
            $table->string('vc_estado_equipo', 100);
            $table->string('vc_garantia_equipo', 100)->nullable();
            $table->integer('i_fk_id_ubicacion')->nullable();
            $table->integer('i_fk_id_empleado')->nullable();
        
            // Relacionar claves foráneas
            $table->foreign('i_fk_id_ubicacion')->references('i_pk_id')->on('ubicacion')->onDelete('set null');
            $table->foreign('i_fk_id_empleado')->references('i_pk_id')->on('empleado')->onDelete('set null');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_equipo');
    }
};
