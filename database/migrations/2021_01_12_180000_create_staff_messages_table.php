<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('message_id');
            $table->timestamps();
       
            // 外部キー制約
            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('cascade');
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
            
            /*---------------------------------------------------
            $table->bigIncrements('id');
            $table->unsignedBigInteger('staff_id');
            $table->string('content');
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('staff_id')->references('id')->on('staffs');
            ---------------------------------------------------*/
        });
    }

    
    public function down()
    {
        
        //Schema::dropIfExists('staffs');
        Schema::dropIfExists('staff_messages');
    }
}
