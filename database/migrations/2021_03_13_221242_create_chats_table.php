<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('from_user_id');
            $table->integer('to_user_id');
            $table->foreign('from_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('to_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->text('message');
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
        Schema::dropIfExists('chats');
    }
}
