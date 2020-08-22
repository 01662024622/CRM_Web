<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_markets', function (Blueprint $table) {
            $table->id();
            $table->date("date_work");
            $table->integer("customer_id");
            $table->string("advisory")->nullable();
            $table->string("feedback")->nullable();
            $table->string("feedback_other")->nullable();
            $table->string("dev_plan")->nullable();
            $table->string("type");
            $table->string("scale")->nullable();
            $table->string("service")->nullable();
            $table->string("type_market")->nullable();
            $table->string("image_1")->nullable();
            $table->string("image_2")->nullable();
            $table->string("image_3")->nullable();
            $table->bigInteger("user_id");
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('report_markets');
    }
}
