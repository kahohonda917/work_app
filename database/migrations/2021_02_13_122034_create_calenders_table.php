<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calenders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->dateTime('start_time_plan');
            $table->dateTime('end_time_plan');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->dateTime('break_time_start');
            $table->dateTime('break_time_end');
            $table->timestamps();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calenders');
    }
}
