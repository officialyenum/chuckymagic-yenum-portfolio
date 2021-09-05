<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('username');
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('verified')->default(0);
            $table->string('verification_token')->nullable();
            $table->boolean('subscribed')->default(0);
            $table->string('email')->unique()->nullable();
            $table->timestamp('dob')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_seen')->nullable();
            $table->string('password');
            $table->text('bio')->nullable();
            $table->integer('role_id')->default(4);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
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
