<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {


            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('invoice_id');
            $table->integer('gateway_id');
            $table->integer('amount');
            $table->string('reference_code');
            $table->string('authority');
            $table->string('ip');
            $table->tinyInteger('status');
            $table->timestamp("last_request_at");
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
