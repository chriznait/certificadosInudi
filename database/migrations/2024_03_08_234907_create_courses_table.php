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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_curso', 300);
            $table->text('descripcion', 500)->nullable();
            $table->string('abreviatura', 50)->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->date('fecha_inicio_inscripcion');
            $table->date('fecha_fin_inscripcion');
            $table->integer('cantidad')->nullable();
            $table->string('img_portada', 300)->nullable();
            $table->string('img_certificado', 300)->nullable();
            $table->string('link_grupo' , 300)->nullable();
            $table->enum('tipo', ['Gratuito', 'Pago']);
            $table->integer('flag')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
