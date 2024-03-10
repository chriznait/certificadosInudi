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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_documento', ['DNI', 'CARNET DE EXTRANJERIA', 'PASAPORTE']);
            $table->string('numero_documento', 15)->unique();
            $table->string('nombres', 100)->nullable();
            $table->string('apellido_paterno', 100)->nullable();
            $table->string('apellido_materno', 100)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('sexo', ['M', 'F']);
            $table->string('email', 100);
            $table->string('telefono', 15)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('profesion', 100)->nullable();
            $table->enum('grado_instruccion' , ['TECNICO', 'UNIVERSITARIO' , 'BACHILLER', 'TITULADO', 'MAESTRIA', 'DOCTORADO']);
            //$table->foreignId('country_id')->constrained();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->integer('flag')->default('1');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
