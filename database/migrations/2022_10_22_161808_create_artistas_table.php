<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artistas', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->text('cover_carousel');
            $table->longText('descripcion');
            $table->string('correo');
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('titulo')->nullable();
            $table->string('subtitulo')->nullable();
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
        Schema::dropIfExists('artistas');
    }
};
