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
        Schema::create('galerias', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('artista_id')->unsigned();
            $table->string("image_obra");
            $table->string("titulo_obra")->nullable();
            $table->string("descripcion_obra")->nullable();
            $table->date('fecha_creacion')->nullable();;
            $table->timestamps();
            $table->foreign("artista_id")->references("id")->on("artistas")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
