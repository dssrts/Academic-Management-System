<?php

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Instructor;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_faculty', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('instructor_id');
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
        });

        DB::table('class_faculty')->insert([
            ['id' => 1, 'class_id' => 1, 'instructor_id' => 2, 'created_at' => null, 'updated_at' => null],
            ['id' => 2, 'class_id' => 2, 'instructor_id' => 3, 'created_at' => null, 'updated_at' => null],
            ['id' => 3, 'class_id' => 3, 'instructor_id' => 3, 'created_at' => null, 'updated_at' => null],
            ['id' => 4, 'class_id' => 4, 'instructor_id' => 4, 'created_at' => null, 'updated_at' => null],
            ['id' => 5, 'class_id' => 5, 'instructor_id' => 4, 'created_at' => null, 'updated_at' => null],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_faculty');
    }
};
