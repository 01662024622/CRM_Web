<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReview360Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_360', function (Blueprint $table) {
            $table->id();
            $table->string("teamwork");
            $table->bigInteger("apartment_id")->default(0);
            $table->bigInteger("user_id")->default(0);
            $table->bigInteger("create_by");
            $table->string("note")->nullable();
            $table->string("option")->nullable();
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
        Schema::dropIfExists('review_360');
    }
}
