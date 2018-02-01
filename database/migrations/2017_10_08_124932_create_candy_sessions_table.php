<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandySessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candy_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('object_id')->unsigned(); // foreign key object
            $table->bigInteger('kid_id')->unsigned(); //foreign key user
            $table->bigInteger('parent_id'); //foreign key user
            $table->json('log');
            $table->json('index')->nullable();
        });
        Schema::table('candy_sessions', function(Blueprint $table){
            // $table->foreign('kid_id')->references('id')->on('users');
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
        Schema::dropIfExists('candy_sessions');
    }
}
