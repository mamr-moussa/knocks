<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicFiguresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_figures', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->timestamps();
          $table->string('name')->nullable();
          $table->string('type')->nullable();
          $table->boolean('verified')->default(0);
          $table->bigInteger('user_id')->unsigned(); //foregin key user
          $table->bigInteger('object_id')->unsigned(); //foregin key
          $table->json('index')->nullable();
        });
        Schema::table('public_figures', function(Blueprint $table){
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
        Schema::dropIfExists('public_figures');
    }
}
