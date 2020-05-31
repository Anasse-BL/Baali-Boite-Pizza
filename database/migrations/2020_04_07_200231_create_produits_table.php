<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->float('prix');
            $table->integer('remise');
            $table->dateTime('date_debut');
            $table->datetime('date_fin');
            $table->boolean('isPromo');
            $table->text('imgPath');
            $table->timestamps();
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('catproduits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
