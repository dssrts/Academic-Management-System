<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSfeStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_sfe_students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_no')->unsigned();
            $table->bigInteger('course_id')->unsigned();
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->index(['student_no', 'course_id']);

            $table->foreign('student_no')->references('student_no')->on('students');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_sfe_students');
    }
}
