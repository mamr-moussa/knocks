<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->timestamps();
            $table->string('name');
            $table->string('font_family')->default('sans-serif');
            $table->string('alignment')->default('left');
            $table->string('display_name')->nullable();
            $table->json('index')->nullable();
        });
        Schema::table('languages' , function (Blueprint $table){
          $table->primary('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
