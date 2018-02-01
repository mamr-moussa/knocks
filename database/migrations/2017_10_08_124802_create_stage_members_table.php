<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStageMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage_members', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->timestamps();
          $table->bigInteger('user_id')->unsigned(); //foreign key user
          $table->bigInteger('stage_id')->unsigned(); //foreign key stage
          $table->string('position');
          $table->json('index')->nullable();
        });
        Schema::table('stage_members', function(Blueprint $table){
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('stage_id')->references('id')->on('stages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stage_members');
    }
}
