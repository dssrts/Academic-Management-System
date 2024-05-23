<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_records', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id'); // Regular BigInteger, not unsigned
            $table->foreign('student_id')->references('id')->on('students');
            $table->integer('control_no');
            $table->string('status', 45);
            $table->string('school_year', 255);
            $table->tinyInteger('semester');
            $table->timestamp('date_enrolled');
            $table->decimal('GWA', 5, 2);
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
        Schema::dropIfExists('students_records');
    }
}
