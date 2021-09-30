<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCctsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccts', function (Blueprint $table) {
            $table->id();
            $table->string('cct', 10)->nullable(false);
            $table->string('nombre_ct', 100)->nullable(false);
            $table->unsignedBigInteger('clave_turno')->nullable(true);
            $table->string('descripcion_turno', 30)->nullable(true);
            $table->unsignedBigInteger('zona_escolar')->nullable(true);
            $table->unsignedBigInteger('sector')->nullable(true);
            $table->string('tipo_escuela', 10)->nullable(true);
            $table->string('multigrado', 1)->nullable(true);
            $table->string('bidocente', 1)->nullable(true);
            $table->string('unitaria', 1)->nullable(true);
            $table->string('domicilio_geografico', 255)->nullable(true);
            $table->unsignedBigInteger('clave_localidad')->nullable(true);
            $table->string('descripcion_localidad', 60)->nullable(true);
            $table->unsignedBigInteger('clave_municipio')->nullable(true);
            $table->string('descripcion_municipio', 60)->nullable(true);
            $table->string('nombre_director', 80)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ccts');
    }
}
