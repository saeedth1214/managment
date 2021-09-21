<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->integer("persons");
            $table->tinyInteger('shifts');
            $table->integer('turn_shift_groups');
            $table->integer('traffics');
            $table->integer('max_salary_month');
            $table->tinyInteger('locations');
            $table->boolean('access_salary');
            $table->boolean('online_connect');
            $table->decimal('price',12,0);
            $table->integer('duration');
            $table->integer('sms_charge');
            $table->tinyInteger('discount');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
