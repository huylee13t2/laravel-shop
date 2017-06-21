<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function ($table) {
           $table->increments('id');
           $table->string('name');
           $table->string('image');
           $table->longText('content');
           $table->integer('price');
           $table->dateTime('created_at');
           $table->dateTime('updated_at');
           $table->integer('category_id')->unsigned();
           $table->foreign('category_id')->references('id')->on('categorys');
           $table->integer('user_id')->unsigned();
           $table->foreign('user_id')->references('id')->on('users');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
