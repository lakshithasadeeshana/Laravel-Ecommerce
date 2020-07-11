<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product',function(Blueprint $table){
           $table->increments('id');
           $table->integer('tax');
           $table->integer('total');
           $table->integer('product_id');
           $table->integer('order_id');
           $table->integer('qty');
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
        //
    }
}
