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
        Schema::create('murales', function (Blueprint $table) {

            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('categoria_murales_id')->unsigned();
            $table->string("titulo_mural");
            $table->longText("descripcion_mural")->nullable();
            $table->string("image_mural");
            $table->string("info_externa")->nullable();
            $table->string("nombre_url")->nullable();
            $table->string("external_url")->nullable();
            $table->string("direccion");
            $table->timestamps();
            $table->foreign("categoria_murales_id")->references("id")->on("categories_murales")->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('murales');
    }
};
