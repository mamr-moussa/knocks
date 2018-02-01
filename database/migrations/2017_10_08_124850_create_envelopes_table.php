<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvelopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envelopes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('status')->default('sent');
            $table->bigInteger('sender_id')->unsigned(); //foreign key user
            $table->bigInteger('reciever_id'); //foreign key user
            $table->bigInteger('object_id')->unsigned(); //foreign key object
            $table->boolean('has_media');
            $table->longText('body')->nullable();
            $table->json('index')->nullable();
        });
        Schema::table('envelopes', function(Blueprint $table){
            // $table->foreign('sender_id')->references('id')->on('users');
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
        Schema::dropIfExists('envelopes');
    }
}
