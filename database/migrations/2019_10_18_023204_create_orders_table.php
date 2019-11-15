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
            $table->unsignedbiginteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('set null');
            $table->string('order_f_name');
            $table->string('order_l_name');
            $table->string('order_email');
            $table->integer('order_phone_no');
            $table->string('order_county');
            $table->string('order_constituency');
            $table->string('order_estate');
            $table->integer('order_subtotal');
            $table->integer('order_delivery_fee')->nullable();
            $table->integer('order_total');
            $table->string('order_payment_method')->nullable();
            $table->boolean('shipped')->default(false);
            
            



           
            $table->timestamps('');
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
