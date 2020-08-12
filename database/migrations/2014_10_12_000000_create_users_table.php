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
            $table->string('name');
            $table->string('tagname');
            $table->string('position');
            $table->integer('apartment_id')->default(0);
            $table->string('location')->nullable();
            $table->string('skype')->nullable();
            $table->string('email_htauto')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_htauto')->nullable();
            $table->date('birth_day')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('authentication')->nullable();
            $table->string('role')->default('blocker');
            $table->rememberToken();
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
