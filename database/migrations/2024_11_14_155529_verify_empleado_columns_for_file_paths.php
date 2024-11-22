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
            $table->string('vc_url_contrato', 255)->nullable()->change(); 
            $table->string('vc_url_examenes', 255)->nullable()->change(); 
            $table->string('vc_url_cedula', 255)->nullable()->change(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empleado', function (Blueprint $table) { 
            $table->string('vc_url_contrato')->nullable()->change(); 
            $table->string('vc_url_examenes')->nullable()->change(); 
            $table->string('vc_url_cedula')->nullable()->change();
        });
    }
};
