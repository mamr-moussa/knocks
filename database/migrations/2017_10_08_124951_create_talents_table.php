<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talents', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->timestamps();
          $table->string('name');
          $table->bigInteger('category_id')->unsigned(); //foreign key talent category
          $table->longText('thumbnail')->nullable();
          $table->json('keywords')->nullable();
          $table->json('index')->nullable();
        });
        Schema::table('talents', function(Blueprint $table){
            // $table->foreign('category_id')->references('id')->on('talent_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talents');
    }
}
