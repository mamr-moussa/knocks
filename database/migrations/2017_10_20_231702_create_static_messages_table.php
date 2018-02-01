<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_messages', function (Blueprint $table) {
            $table->integer('id');
            $table->timestamps();
            $table->longText('body');
            $table->string('language');
            $table->json('index')->nullable();
        });
          Schema::table('static_messages', function(Blueprint $table){
           // $table->foreign('language')->references('name')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('static_messages');
    }
}
