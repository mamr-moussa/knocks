<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHighEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('high_educations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('study_at')->nullable();
            $table->date('study_since')->nullable();
            $table->date('study_to')->nullable();
            $table->string('study_what')->nullable();
            $table->string('grade')->nullable();
            $table->bigInteger('user_id')->unsigned(); //foregin key user
            $table->bigInteger('object_id')->unsigned(); //foregin key
            $table->json('index')->nullable();
        });
        Schema::table('high_educations', function(Blueprint $table){
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
        Schema::dropIfExists('high_educations');
    }
}
