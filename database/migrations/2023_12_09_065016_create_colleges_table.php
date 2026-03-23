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
        Schema::create('colleges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('college_code', 255);
            $table->string('college_name', 255);
        });

        DB::table('colleges')->insert([
            ['id' => 1, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_code' => 'CISTM', 'college_name' => 'College of Information System and Technology Management'],
            ['id' => 2, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_code' => 'SG', 'college_name' => 'School of Government'],
            ['id' => 3, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_code' => 'PLMBS', 'college_name' => 'PLM Business School'],
            ['id' => 4, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_code' => 'CS', 'college_name' => 'College of Science'],
            ['id' => 5, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_code' => 'CPT', 'college_name' => 'College of Physical Therapy'],
            ['id' => 6, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_code' => 'CN', 'college_name' => 'College of Nursing'],
            ['id' => 7, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_code' => 'CHASS', 'college_name' => 'College of Humanities, Arts, and Social Sciences'],
            ['id' => 8, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_code' => 'CET', 'college_name' => 'College of Engineering and Technology'],
            ['id' => 9, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_code' => 'CED', 'college_name' => 'College of Education'],
            ['id' => 10, 'created_at' => '2024-06-05 16:22:56', 'updated_at' => '2024-06-05 16:22:56', 'college_code' => 'CAUP', 'college_name' => 'College of Architecture and Urban Planning'],
            ['id' => 11, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_code' => 'CISTM', 'college_name' => 'College of Information System and Technology Management'],
            ['id' => 12, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_code' => 'SG', 'college_name' => 'School of Government'],
            ['id' => 13, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_code' => 'PLMBS', 'college_name' => 'PLM Business School'],
            ['id' => 14, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_code' => 'CS', 'college_name' => 'College of Science'],
            ['id' => 15, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_code' => 'CPT', 'college_name' => 'College of Physical Therapy'],
            ['id' => 16, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_code' => 'CN', 'college_name' => 'College of Nursing'],
            ['id' => 17, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_code' => 'CHASS', 'college_name' => 'College of Humanities, Arts, and Social Sciences'],
            ['id' => 18, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_code' => 'CET', 'college_name' => 'College of Engineering and Technology'],
            ['id' => 19, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_code' => 'CED', 'college_name' => 'College of Education'],
            ['id' => 20, 'created_at' => '2024-06-05 16:23:09', 'updated_at' => '2024-06-05 16:23:09', 'college_code' => 'CAUP', 'college_name' => 'College of Architecture and Urban Planning'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colleges');
    }
};
