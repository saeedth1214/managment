<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompanyHasAlert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_has_alert', function (Blueprint $table) {

            $table->unsignedBigInteger("company_id");
            $table->unsignedBigInteger("alert_id");

            $table->timestamp("delivered_at");

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('alert_id')->references('id')->on('alerts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_has_alert');
    }
}
