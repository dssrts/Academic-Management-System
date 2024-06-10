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
        DB::table('class_schedules')->insert([
            ['id' => 65, 'day' => 'Friday', 'start_time' => '16:00:00', 'end_time' => '17:30:00', 'schedule_name' => 'Lecture', 'created_at' => '2024-06-09 09:40:08', 'updated_at' => '2024-06-09 09:40:08', 'class_id' => 5, 'class_mode_id' => 1, 'room_id' => 2],
            ['id' => 68, 'day' => 'Saturday', 'start_time' => '07:00:00', 'end_time' => '08:00:00', 'schedule_name' => 'Lab', 'created_at' => '2024-06-09 09:40:08', 'updated_at' => '2024-06-09 09:40:08', 'class_id' => 3, 'class_mode_id' => 1, 'room_id' => 4],
            ['id' => 69, 'day' => 'Friday', 'start_time' => '14:00:00', 'end_time' => '16:00:00', 'schedule_name' => 'Lecture', 'created_at' => '2024-06-09 09:40:08', 'updated_at' => '2024-06-09 09:40:08', 'class_id' => 4, 'class_mode_id' => 2, 'room_id' => 1],
            ['id' => 70, 'day' => 'Friday', 'start_time' => '13:00:00', 'end_time' => '15:00:00', 'schedule_name' => 'Lab', 'created_at' => '2024-06-09 09:40:08', 'updated_at' => '2024-06-09 09:40:08', 'class_id' => 6, 'class_mode_id' => 1, 'room_id' => 4],
        ]);
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
