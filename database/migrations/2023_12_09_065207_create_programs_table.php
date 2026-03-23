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
        Schema::create('programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program_title', 255);
            $table->string('program_code', 255);
            $table->string('degree', 255);
            $table->string('degree_level', 255);
            $table->integer('num_credits');
            $table->timestamps();
            $table->unsignedBigInteger('college_id');

            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade')->onUpdate('cascade');
        });

        DB::table('programs')->insert([
            ['id' => 1, 'program_title' => 'Bachelor of Science in Public Administration', 'program_code' => 'BSPA', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 1],
            ['id' => 2, 'program_title' => 'Bachelor of Science in Accountancy', 'program_code' => 'BS ACCTG', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 2],
            ['id' => 3, 'program_title' => 'Bachelor of Science in Business Administration Major in Business Economics', 'program_code' => 'BSBA BE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 2],
            ['id' => 4, 'program_title' => 'Bachelor of Science in Business Administration Major in Financial Management', 'program_code' => 'BSBA FM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 2],
            ['id' => 5, 'program_title' => 'Bachelor of Science in Business Administration Major in Human Resource Management', 'program_code' => 'BSBA HRM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 2],
            ['id' => 6, 'program_title' => 'Bachelor of Science in Business Administration Major in Marketing Management', 'program_code' => 'BSBA MM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 2],
            ['id' => 7, 'program_title' => 'Bachelor of Science in Business Administration Major in Operations Management', 'program_code' => 'BSBA OM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 2],
            ['id' => 8, 'program_title' => 'Bachelor of Science in Entrepreneurship', 'program_code' => 'BS ENTRE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 2],
            ['id' => 9, 'program_title' => 'Bachelor of Science In Hospitality Management', 'program_code' => 'BSHM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 3],
            ['id' => 10, 'program_title' => 'Bachelor of Science in Tourism Management', 'program_code' => 'BSTM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 3],
            ['id' => 11, 'program_title' => 'Bachelor of Science in Biology', 'program_code' => 'BS Bio', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 3],
            ['id' => 12, 'program_title' => 'Bachelor of Science in Chemistry', 'program_code' => 'BS Chem', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 3],
            ['id' => 13, 'program_title' => 'Bachelor of Science in Mathematics', 'program_code' => 'BS Math', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 3],
            ['id' => 14, 'program_title' => 'Bachelor of Science in Psychology', 'program_code' => 'BS PSY', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 4],
            ['id' => 15, 'program_title' => 'Bachelor of Science in Physical Therapy', 'program_code' => 'BSPT', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 4],
            ['id' => 16, 'program_title' => 'Bachelor of Science in Nursing', 'program_code' => 'BSN', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 5],
            ['id' => 17, 'program_title' => 'Bachelor of Arts in Communication', 'program_code' => 'BAC', 'degree' => 'BA', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 6],
            ['id' => 18, 'program_title' => 'Bachelor of Arts in Communication Major in Public Relations', 'program_code' => 'BAC-PR', 'degree' => 'BA', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 6],
            ['id' => 19, 'program_title' => 'Bachelor of Arts in Public Relations', 'program_code' => 'BAPR', 'degree' => 'BA', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 6],
            ['id' => 20, 'program_title' => 'Bachelor of Science in Social Work', 'program_code' => 'BS SW', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 6],
            ['id' => 21, 'program_title' => 'Bachelor of Science in Chemical Engineering', 'program_code' => 'BSCHE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 7],
            ['id' => 22, 'program_title' => 'Bachelor of Science in Civil Engineering', 'program_code' => 'BSCE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 7],
            ['id' => 23, 'program_title' => 'Bachelor of Science in Computer Engineering', 'program_code' => 'BS CpE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 7],
            ['id' => 24, 'program_title' => 'Bachelor of Science in Computer Science', 'program_code' => 'BSCS', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 7],
            ['id' => 25, 'program_title' => 'Bachelor of Science in Electrical Engineering', 'program_code' => 'BSEE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 7],
            ['id' => 26, 'program_title' => 'Bachelor of Science in Electronics Engineering', 'program_code' => 'BS ECE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 7],
            ['id' => 27, 'program_title' => 'Bachelor of Science in Information Technology', 'program_code' => 'BSIT', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 7],
            ['id' => 28, 'program_title' => 'Bachelor of Science in Manufacturing Engineering', 'program_code' => 'BSMFGE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 7],
            ['id' => 29, 'program_title' => 'Bachelor of Science in Mechanical Engineering', 'program_code' => 'BSME', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 7],
            ['id' => 30, 'program_title' => 'Bachelor of Elementary Education (Generalist)', 'program_code' => 'BEEd', 'degree' => 'BEEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 8],
            ['id' => 31, 'program_title' => 'Bachelor of Secondary Education major in English', 'program_code' => 'BSEd-Eng', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 8],
            ['id' => 32, 'program_title' => 'Bachelor of Secondary Education major in Filipino', 'program_code' => 'BSEd-Fil', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 8],
            ['id' => 33, 'program_title' => 'Bachelor of Secondary Education major Mathematics', 'program_code' => 'BSEd-Math', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 8],
            ['id' => 34, 'program_title' => 'Bachelor of Secondary Education major in Sciences', 'program_code' => 'BSEd-Sciences', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 8],
            ['id' => 35, 'program_title' => 'Bachelor of Secondary Education major in Social Studies', 'program_code' => 'BSEd-SS', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 8],
            ['id' => 36, 'program_title' => 'Bachelor of Physical Education', 'program_code' => 'BPE', 'degree' => 'BPE', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_id' => 8],
            ['id' => 37, 'program_title' => 'Bachelor of Science in Public Administration', 'program_code' => 'BSPA', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 1],
            ['id' => 38, 'program_title' => 'Bachelor of Science in Accountancy', 'program_code' => 'BS ACCTG', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 2],
            ['id' => 39, 'program_title' => 'Bachelor of Science in Business Administration Major in Business Economics', 'program_code' => 'BSBA BE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 2],
            ['id' => 40, 'program_title' => 'Bachelor of Science in Business Administration Major in Financial Management', 'program_code' => 'BSBA FM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 2],
            ['id' => 41, 'program_title' => 'Bachelor of Science in Business Administration Major in Human Resource Management', 'program_code' => 'BSBA HRM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 2],
            ['id' => 42, 'program_title' => 'Bachelor of Science in Business Administration Major in Marketing Management', 'program_code' => 'BSBA MM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 2],
            ['id' => 43, 'program_title' => 'Bachelor of Science in Business Administration Major in Operations Management', 'program_code' => 'BSBA OM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 2],
            ['id' => 44, 'program_title' => 'Bachelor of Science in Entrepreneurship', 'program_code' => 'BS ENTRE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 2],
            ['id' => 45, 'program_title' => 'Bachelor of Science In Hospitality Management', 'program_code' => 'BSHM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 3],
            ['id' => 46, 'program_title' => 'Bachelor of Science in Tourism Management', 'program_code' => 'BSTM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 3],
            ['id' => 47, 'program_title' => 'Bachelor of Science in Biology', 'program_code' => 'BS Bio', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 3],
            ['id' => 48, 'program_title' => 'Bachelor of Science in Chemistry', 'program_code' => 'BS Chem', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 3],
            ['id' => 49, 'program_title' => 'Bachelor of Science in Mathematics', 'program_code' => 'BS Math', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 3],
            ['id' => 50, 'program_title' => 'Bachelor of Science in Psychology', 'program_code' => 'BS PSY', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 4],
            ['id' => 51, 'program_title' => 'Bachelor of Science in Physical Therapy', 'program_code' => 'BSPT', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 4],
            ['id' => 52, 'program_title' => 'Bachelor of Science in Nursing', 'program_code' => 'BSN', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 5],
            ['id' => 53, 'program_title' => 'Bachelor of Arts in Communication', 'program_code' => 'BAC', 'degree' => 'BA', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 6],
            ['id' => 54, 'program_title' => 'Bachelor of Arts in Communication Major in Public Relations', 'program_code' => 'BAC-PR', 'degree' => 'BA', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 6],
            ['id' => 55, 'program_title' => 'Bachelor of Arts in Public Relations', 'program_code' => 'BAPR', 'degree' => 'BA', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 6],
            ['id' => 56, 'program_title' => 'Bachelor of Science in Social Work', 'program_code' => 'BS SW', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 6],
            ['id' => 57, 'program_title' => 'Bachelor of Science in Chemical Engineering', 'program_code' => 'BSCHE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 7],
            ['id' => 58, 'program_title' => 'Bachelor of Science in Civil Engineering', 'program_code' => 'BSCE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 7],
            ['id' => 59, 'program_title' => 'Bachelor of Science in Computer Engineering', 'program_code' => 'BS CpE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 7],
            ['id' => 60, 'program_title' => 'Bachelor of Science in Computer Science', 'program_code' => 'BSCS', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 7],
            ['id' => 61, 'program_title' => 'Bachelor of Science in Electrical Engineering', 'program_code' => 'BSEE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 7],
            ['id' => 62, 'program_title' => 'Bachelor of Science in Electronics Engineering', 'program_code' => 'BS ECE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 7],
            ['id' => 63, 'program_title' => 'Bachelor of Science in Information Technology', 'program_code' => 'BSIT', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 7],
            ['id' => 64, 'program_title' => 'Bachelor of Science in Manufacturing Engineering', 'program_code' => 'BSMFGE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 7],
            ['id' => 65, 'program_title' => 'Bachelor of Science in Mechanical Engineering', 'program_code' => 'BSME', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 7],
            ['id' => 66, 'program_title' => 'Bachelor of Elementary Education (Generalist)', 'program_code' => 'BEEd', 'degree' => 'BEEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 8],
            ['id' => 67, 'program_title' => 'Bachelor of Secondary Education major in English', 'program_code' => 'BSEd-Eng', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 8],
            ['id' => 68, 'program_title' => 'Bachelor of Secondary Education major in Filipino', 'program_code' => 'BSEd-Fil', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 8],
            ['id' => 69, 'program_title' => 'Bachelor of Secondary Education major Mathematics', 'program_code' => 'BSEd-Math', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 8],
            ['id' => 70, 'program_title' => 'Bachelor of Secondary Education major in Sciences', 'program_code' => 'BSEd-Sciences', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 8],
            ['id' => 71, 'program_title' => 'Bachelor of Secondary Education major in Social Studies', 'program_code' => 'BSEd-SS', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 8],
            ['id' => 72, 'program_title' => 'Bachelor of Physical Education', 'program_code' => 'BPE', 'degree' => 'BPE', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_id' => 8],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
};
