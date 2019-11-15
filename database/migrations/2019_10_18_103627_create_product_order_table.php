<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productorder', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedbiginteger('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')
            ->on('orders')->onUpdate('cascade')->onDelete('set null'); //order id as a foreign key

 
            $table->unsignedbiginteger('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')
            ->on('products')->onUpdate('cascade')->onDelete('set null'); //product id as a foreign key


            $table->integer('quantity')->unsigned();  // store qunatity

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
        Schema::dropIfExists('productorder');
    }
}
