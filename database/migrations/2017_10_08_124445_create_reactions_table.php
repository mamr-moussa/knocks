<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactions', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->timestamps();
          $table->string('type');
          $table->string('parent_type');
          $table->bigInteger('parent_id'); //parent(Post / Comment) foreign key
          $table->bigInteger('user_id')->unsigned(); //user foreign key
          $table->bigInteger('object_id')->unsigned(); //object foreign key
          $table->json('index')->nullable();
        });
        Schema::table('reactions', function(Blueprint $table){
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
        Schema::dropIfExists('reactions');
    }
}
