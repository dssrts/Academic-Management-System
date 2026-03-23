<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject_code', 255);
            $table->string('subject_title', 255);
            $table->string('course_number', 255);
            $table->integer('units');
            $table->integer('class_code');
            $table->string('pre_requisite', 255);
            $table->timestamps();
            $table->unsignedBigInteger('program_id');

            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade')->onUpdate('cascade');
        });

        DB::table('courses')->insert([
            ['id' => 1, 'subject_code' => 'CS101', 'subject_title' => 'Introduction to Computer Science', 'course_number' => '101', 'units' => 3, 'class_code' => 101, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 2, 'subject_code' => 'CS102', 'subject_title' => 'Data Structures', 'course_number' => '102', 'units' => 4, 'class_code' => 102, 'pre_requisite' => 'CS101', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 3, 'subject_code' => 'CSC 0314', 'subject_title' => 'Operating System (Lec)', 'course_number' => '0314', 'units' => 2, 'class_code' => 314, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 4, 'subject_code' => 'CSC 0314.1', 'subject_title' => 'Operating System (Lab)', 'course_number' => '0314.1', 'units' => 1, 'class_code' => 3141, 'pre_requisite' => 'CSC 0314', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 5, 'subject_code' => 'CSC 0315', 'subject_title' => 'Intelligent System (Lec)', 'course_number' => '0315', 'units' => 2, 'class_code' => 315, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 6, 'subject_code' => 'CSC 0315.1', 'subject_title' => 'Intelligent System (Lab)', 'course_number' => '0315.1', 'units' => 1, 'class_code' => 3151, 'pre_requisite' => 'CSC 0315', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 7, 'subject_code' => 'CSC 0311', 'subject_title' => 'Automata Theory and Formal Languages', 'course_number' => '0311', 'units' => 3, 'class_code' => 311, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 8, 'subject_code' => 'CSC 0312', 'subject_title' => 'Programming Languages (Lec)', 'course_number' => '0312', 'units' => 2, 'class_code' => 312, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 9, 'subject_code' => 'CSC 0312.1', 'subject_title' => 'Programming Languages (Lab)', 'course_number' => '0312.1', 'units' => 1, 'class_code' => 3121, 'pre_requisite' => 'CSC 0312', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 10, 'subject_code' => 'CSC 0313', 'subject_title' => 'Software Engineering (Lec)', 'course_number' => '0313', 'units' => 2, 'class_code' => 313, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 11, 'subject_code' => 'CSC 0313.1', 'subject_title' => 'Software Engineering (Lab)', 'course_number' => '0313.1', 'units' => 1, 'class_code' => 3131, 'pre_requisite' => 'CSC 0313', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 12, 'subject_code' => 'CSC 0311', 'subject_title' => 'Algorithm and Complexity', 'course_number' => '0311', 'units' => 3, 'class_code' => 311, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 13, 'subject_code' => 'CSC 0315', 'subject_title' => 'Information Assurance Security', 'course_number' => '0315', 'units' => 3, 'class_code' => 315, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 14, 'subject_code' => 'CSC 0312.1', 'subject_title' => 'Environmental Science', 'course_number' => '0312.1', 'units' => 3, 'class_code' => 3121, 'pre_requisite' => 'CSC 0312', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 15, 'subject_code' => 'CSC 0314', 'subject_title' => 'Applications Development and Emerging Technologies (Lec)', 'course_number' => '0314', 'units' => 2, 'class_code' => 314, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 16, 'subject_code' => 'CSC 0313', 'subject_title' => 'Applications Development and Emerging Technologies (Lab)', 'course_number' => '0313', 'units' => 1, 'class_code' => 313, 'pre_requisite' => 'CSC 0313', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 17, 'subject_code' => 'CSC 0312', 'subject_title' => 'Architecture and Organization (Lec)', 'course_number' => '0312', 'units' => 2, 'class_code' => 312, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 18, 'subject_code' => 'CSC 0313.1', 'subject_title' => 'Architecture and Organization (Lab)', 'course_number' => '0313.1', 'units' => 1, 'class_code' => 3131, 'pre_requisite' => 'CSC 0313', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 19, 'subject_code' => 'CSC 0212', 'subject_title' => 'Object Oriented Programming (Lec)', 'course_number' => '0212', 'units' => 2, 'class_code' => 212, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 20, 'subject_code' => 'CSC 0212.1', 'subject_title' => 'Object Oriented Programming (Lab)', 'course_number' => '0212.1', 'units' => 1, 'class_code' => 2121, 'pre_requisite' => 'CSC 0212', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 21, 'subject_code' => 'CSC 0213', 'subject_title' => 'Logic Design and Digital Computer Circuits (Lec)', 'course_number' => '0213', 'units' => 2, 'class_code' => 213, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 22, 'subject_code' => 'CSC 0213.1', 'subject_title' => 'Logic Design and Digital Computer Circuits (Lab)', 'course_number' => '0213.1', 'units' => 1, 'class_code' => 2131, 'pre_requisite' => 'CSC 0213', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 23, 'subject_code' => 'CSC 0224', 'subject_title' => 'Operation Research', 'course_number' => '0224', 'units' => 3, 'class_code' => 224, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 24, 'subject_code' => 'ICC 0105', 'subject_title' => 'Information Management (Lec)', 'course_number' => '0105', 'units' => 2, 'class_code' => 105, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 25, 'subject_code' => 'ICC 0105.1', 'subject_title' => 'Information Management (Lab)', 'course_number' => '0105.1', 'units' => 1, 'class_code' => 1051, 'pre_requisite' => 'ICC 0105', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 26, 'subject_code' => 'ITE 0001', 'subject_title' => 'Living in the IT Era', 'course_number' => '0001', 'units' => 3, 'class_code' => 1, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 27, 'subject_code' => 'ETH 0008', 'subject_title' => 'Ethics', 'course_number' => '0008', 'units' => 3, 'class_code' => 8, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 28, 'subject_code' => 'UTS 0003', 'subject_title' => 'Understanding the Self', 'course_number' => '0003', 'units' => 3, 'class_code' => 3, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 29, 'subject_code' => 'PE 13', 'subject_title' => 'Basketball', 'course_number' => '13', 'units' => 2, 'class_code' => 13, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 30, 'subject_code' => 'CSC 0223', 'subject_title' => 'Human Computer Interaction', 'course_number' => '0223', 'units' => 3, 'class_code' => 223, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 31, 'subject_code' => 'CSC 0315.1', 'subject_title' => 'Discrete Structures 2', 'course_number' => '0315.1', 'units' => 3, 'class_code' => 3151, 'pre_requisite' => 'CSC 0315', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 32, 'subject_code' => 'CSC 0311', 'subject_title' => 'The Contemporary World', 'course_number' => '0311', 'units' => 3, 'class_code' => 311, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 33, 'subject_code' => 'CSC 0315', 'subject_title' => 'Readings in Philippine History', 'course_number' => '0315', 'units' => 3, 'class_code' => 315, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 34, 'subject_code' => 'CSC 0312.1', 'subject_title' => 'Life and Works of Rizal', 'course_number' => '0312.1', 'units' => 3, 'class_code' => 3121, 'pre_requisite' => 'CSC 0312', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 35, 'subject_code' => 'CSC 0314', 'subject_title' => 'Data Structures and Algorithms (Lec)', 'course_number' => '0314', 'units' => 2, 'class_code' => 314, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 36, 'subject_code' => 'CSC 0313', 'subject_title' => 'Data Structures and Algorithms (Lab)', 'course_number' => '0313', 'units' => 1, 'class_code' => 313, 'pre_requisite' => 'CSC 0313', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 37, 'subject_code' => 'CSC 0312', 'subject_title' => 'Intermediate Programming (Lec)', 'course_number' => '0312', 'units' => 2, 'class_code' => 312, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 38, 'subject_code' => 'CSC 0313.1', 'subject_title' => 'Intermediate Programming (Lab)', 'course_number' => '0313.1', 'units' => 1, 'class_code' => 3131, 'pre_requisite' => 'CSC 0313', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 39, 'subject_code' => 'CSC 0312', 'subject_title' => 'Introduction to Computing (Lec)', 'course_number' => '0312', 'units' => 2, 'class_code' => 312, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 40, 'subject_code' => 'CSC 0313.1', 'subject_title' => 'Introduction to Computing (Lab)', 'course_number' => '0313.1', 'units' => 1, 'class_code' => 3131, 'pre_requisite' => 'CSC 0313', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 41, 'subject_code' => 'CSC 0314.1', 'subject_title' => 'Foundation of Physical Activities', 'course_number' => '0314.1', 'units' => 2, 'class_code' => 3141, 'pre_requisite' => 'CSC 0314', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 42, 'subject_code' => 'CSC 0315.1', 'subject_title' => 'Science, Technology and Society', 'course_number' => '0315.1', 'units' => 3, 'class_code' => 3151, 'pre_requisite' => 'CSC 0315', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 43, 'subject_code' => 'CSC 0311', 'subject_title' => 'Purposive Communication', 'course_number' => '0311', 'units' => 3, 'class_code' => 311, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 44, 'subject_code' => 'CSC 0315', 'subject_title' => 'Mathematics in the Modern World', 'course_number' => '0315', 'units' => 3, 'class_code' => 315, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 45, 'subject_code' => 'CSC 0312.1', 'subject_title' => 'Discrete Structures 1', 'course_number' => '0312.1', 'units' => 3, 'class_code' => 3121, 'pre_requisite' => 'CSC 0312', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 46, 'subject_code' => 'CSC 0314', 'subject_title' => 'Fundamentals of Programming (Lec)', 'course_number' => '0314', 'units' => 2, 'class_code' => 314, 'pre_requisite' => '', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
            ['id' => 47, 'subject_code' => 'CSC 0313', 'subject_title' => 'Fundamentals of Programming (Lab)', 'course_number' => '0313', 'units' => 1, 'class_code' => 313, 'pre_requisite' => 'CSC 0313', 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'program_id' => 24],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
