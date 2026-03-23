<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateClassSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('day');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('schedule_name');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('class_mode_id');
            $table->unsignedBigInteger('room_id')->nullable();

            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade')->onUpdate('cascade');
            
        });

        // Insert data
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_schedules', function (Blueprint $table) {
            $table->dropForeign(['class_id']);
            $table->dropForeign(['class_mode_id']);
            $table->dropForeign(['room_id']);
            $table->dropIndex(['class_id', 'class_mode_id', 'room_id']);
        });

        Schema::dropIfExists('class_schedules');
    }
}
