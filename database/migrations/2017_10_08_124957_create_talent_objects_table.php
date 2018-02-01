<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalentObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talent_objects', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->timestamps();
          $table->string('name');
          $table->bigInteger('talent_id')->unsigned(); //foreign key talent
          $table->bigInteger('object_id')->unsigned(); //foreign key object
          $table->bigInteger('user_id')->unsigned(); //foreign key user
          $table->json('keywords')->nullable();
          $table->json('index')->nullable();
        });
        Schema::table('talent_objects', function(Blueprint $table){
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('object_id')->references('id')->on('objects');
            // $table->foreign('talent_id')->references('id')->on('talents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talent_objects');
    }
}
