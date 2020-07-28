<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate', function (Blueprint $table) {
            $table->id();
            $table->integer('demeanor')->default(5);
            $table->integer('responsiveness')->default(5);
            $table->integer('competence')->default(5);
            $table->integer('tangible')->default(5);
            $table->integer('completeness')->default(5);
            $table->integer('relevancy')->default(5);
            $table->integer('accuracy')->default(5);
            $table->integer('currency')->default(5);
            $table->integer('training_provider')->default(5);
            $table->integer('user_understanding')->default(5);
            $table->integer('participation')->default(5);
            $table->integer('easier_to_the_job')->default(5);
            $table->integer('increase_productivity')->default(5);
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
        Schema::dropIfExists('rate');
    }
}
