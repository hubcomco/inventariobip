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
        Schema::table('empleado', function (Blueprint $table) { 
            $table->string('vc_url_contrato', 255)->change(); 
            $table->string('vc_url_examenes', 255)->change(); 
            $table->string('vc_url_cedula', 255)->change(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empleado', function (Blueprint $table) { 
            $table->string('vc_url_contrato')->change(); 
            $table->string('vc_url_examenes')->change(); 
            $table->string('vc_url_cedula')->change();
        });
    }
};
