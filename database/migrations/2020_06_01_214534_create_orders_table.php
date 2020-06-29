<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payment_intent_id')->unique();
            $table->integer('amount');
            
            $table->timestamp('payment_created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->text('produits');
            $table->unsignedBigInteger('user_id');
            $table->string('adresseliv')->nullable();
            $table->string('telephone')->nullable();
            $table->string('ville')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
