<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffMessageForUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_message_for_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('staff_message_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('staff_message_id')->references('id')->on('staff_messages')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_message_for_users');
    }
}
