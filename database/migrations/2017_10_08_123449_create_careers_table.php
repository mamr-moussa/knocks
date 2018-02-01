<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->timestamps();
          $table->string('works_at')->nullable();
          $table->date('works_since')->nullable();
          $table->date('works_to')->nullable();
          $table->string('works_what')->nullable();
          $table->string('works_as')->nullable();
          $table->bigInteger('user_id')->unsigned(); //foregin key user
          $table->bigInteger('object_id')->unsigned(); //foregin key
          $table->json('index')->nullable();
        });
        Schema::table('careers', function(Blueprint $table){
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
        Schema::dropIfExists('careers');
    }
}
