<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOgtsBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('ogts_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_no');
            $table->string('recipient_email')->default('ogts_services@plm.edu.ph');
            $table->text('message');
            $table->string('subject');
            $table->boolean('status')->default(false);
            $table->boolean('viewed')->default(false);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('student_no')
                  ->references('student_no')
                  ->on('students')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ogts_bookings');
    }
}
