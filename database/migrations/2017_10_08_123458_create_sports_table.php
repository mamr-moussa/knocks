<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sports', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->timestamps();
          $table->string('name')->nullable();
          $table->longText('url')->nullable();
          $table->bigInteger('user_id')->unsigned(); //foregin key user
          $table->bigInteger('object_id')->unsigned(); //foregin key
          $table->json('index')->nullable();
        });
        Schema::table('sports', function(Blueprint $table){
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('object_id')->references('id')->on('objects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sports');
    }
}
