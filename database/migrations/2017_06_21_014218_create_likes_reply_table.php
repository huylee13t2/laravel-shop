<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes_reply', function ($table) {
           $table->increments('id');
           $table->dateTime('created_at');
           $table->dateTime('updated_at');
           $table->integer('product_id')->unsigned();
           $table->foreign('product_id')->references('id')->on('products');
           $table->integer('user_id')->unsigned();
           $table->foreign('user_id')->references('id')->on('users');
           $table->integer('profile_id')->unsigned();
           $table->foreign('profile_id')->references('id')->on('profile');
           $table->integer('reply_id')->unsigned();
           $table->foreign('reply_id')->references('id')->on('replies');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes_reply');
    }
}
