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
            $table->integer("customer_id");
            $table->string("advisory");
            $table->string("feedback");
            $table->string("dev_plan");
            $table->string("type");
            $table->string("scale");
            $table->string("service");
            $table->string("type_market");
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
