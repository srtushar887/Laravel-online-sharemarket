<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('plan_id')->nullable();
            $table->timestamp('return_date')->nullable();
            $table->timestamp('first_date')->nullable();
            $table->timestamp('second_date')->nullable();
            $table->timestamp('third_date')->nullable();
            $table->float('amount')->nullable();
            $table->float('profit')->nullable();
            $table->float('profit_amount')->nullable();
            $table->float('return_amount')->nullable();
            $table->integer('status')->nullable();
            $table->integer('plan_type')->nullable();
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
        Schema::dropIfExists('user_plans');
    }
}
