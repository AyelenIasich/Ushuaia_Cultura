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
        Schema::create('events', function (Blueprint $table) {

            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('categoria_id')->unsigned();
            $table->string("titulo_evento");
            $table->time('hora_evento');
            $table->date('fecha_evento');
            $table->string("resumen");
            $table->longText("descripcion_evento")->nullable();
            $table->string("image_evento");
            $table->string("info_external")->nullable();
            $table->string("nombre_url")->nullable();
            $table->string("external_url")->nullable();
            $table->string("direccion");
            $table->string("institucion")->nullable();
            $table->timestamps();
            $table->foreign("categoria_id")->references("id")->on("categories")->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
