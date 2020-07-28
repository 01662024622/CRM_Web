<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consts', function (Blueprint $table) {
            $table->id();
            $table->integer('demeanor')->default(100);
            $table->integer('responsiveness')->default(100);
            $table->integer('competence')->default(100);
            $table->integer('tangible')->default(100);
            $table->integer('completeness')->default(100);
            $table->integer('relevancy')->default(100);
            $table->integer('accuracy')->default(100);
            $table->integer('currency')->default(100);
            $table->integer('training_provider')->default(100);
            $table->integer('user_understanding')->default(100);
            $table->integer('participation')->default(100);
            $table->integer('easier_to_the_job')->default(100);
            $table->integer('increase_productivity')->default(100);
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
        Schema::dropIfExists('consts');
    }
}
