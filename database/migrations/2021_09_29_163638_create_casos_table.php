<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index()->unique();
            $table->unsignedBigInteger('cct_id')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('rol_id')->nullable(false);
            $table->unsignedBigInteger('tipo_id')->nullable(false);
            $table->unsignedBigInteger('diagnostico_id')->nullable(true);
            $table->unsignedBigInteger('genero_id')->nullable(false);
            $table->string('nombre_pila', 64)->nullable(false);
            $table->string('ap1', 64)->nullable(false);
            $table->string('ap2', 64)->nullable(true);
            $table->string('tel_contacto', 10)->nullable(false);
            $table->string('tel_escuela', 10)->nullable(false);
            $table->string('nombre_reporta', 64)->nullable(false);
            $table->boolean('has_dictamen')->default(false);
            $table->boolean('has_prueba')->default(false);
            $table->boolean('is_atendido')->default(false);
            $table->unsignedBigInteger('enlace_id')->nullable(true);
            $table->date('fecha_regreso')->nullable(true);
            $table->string('observaciones_reporta', 255)->nullable(true);
            $table->string('observaciones_enlace', 255)->nullable(true);
            $table->foreign('cct_id')->references('id')->on('ccts');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('rol_id')->references('id')->on('rols');
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->foreign('diagnostico_id')->references('id')->on('diagnosticos');
            $table->foreign('genero_id')->references('id')->on('generos');
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
        Schema::dropIfExists('casos');
    }
}
