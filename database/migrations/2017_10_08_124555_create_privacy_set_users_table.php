<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivacySetUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privacy_set_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned(); //foreign key user
            $table->bigInteger('preset_id')->unsigned(); //foreign key preset
            $table->bigInteger('object_id')->unsigned(); //foreign key object
            $table->json('index')->nullable();
        });
        Schema::table('privacy_set_users', function(Blueprint $table){
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('object_id')->references('id')->on('objects');
            // $table->foreign('preset_id')->references('id')->on('privacy_presets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privacy_set_users');
    }
}
