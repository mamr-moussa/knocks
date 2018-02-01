<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('study_at')->nullable();
            $table->date('study_since')->nullable();
            $table->string('study_what')->nullable();
            $table->date('study_to')->nullable();
            $table->string('grade')->nullable();
            $table->bigInteger('user_id')->unsigned();     //User id foreign key
            $table->bigInteger('object_id')->unsigned();   //object id foreign key
            $table->json('index')->nullable();
        });
        Schema::table('education', function(Blueprint $table){
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
        Schema::dropIfExists('education');
    }
}
