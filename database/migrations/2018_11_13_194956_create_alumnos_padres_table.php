<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosPadresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos_padres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alumno');
            $table->string('padre');
            $table->boolean('is_tutor')->nullable();
            $table->timestamps();

            $table->foreign('alumno')
                ->references('matricula')->on('alumnos')
                ->onDelete('cascade');
            $table->foreign('padre')
                ->references('curp')->on('padres')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos_padres');
    }
}
