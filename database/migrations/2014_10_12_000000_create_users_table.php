<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('nickname')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('gender');
            $table->string('orientation')->nullable();
            $table->string('religon')->nullable();
            $table->string('marital_status')->nullable();
            $table->longText('profile_picture')->nullable();
            $table->longText('cover_picture')->nullable();
            $table->string('username')->unique();
            $table->boolean('verified')->default(0);
            $table->boolean('activated')->default(0);
            $table->longText('bio')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->dateTime('last_seen')->nullable();
            $table->string('status')->default('online');
            $table->json('attributes_object')->nullable();
            $table->boolean('is_searchable')->default(1);
            $table->json('ballons_configuration');
            $table->json('configuration');
            $table->string('api_token', 60)->unique()->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('upload_tooken')->nullable();
            $table->string('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
