<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_record_id')->nullable(); // unsignedBigInteger for foreign key
            $table->unsignedBigInteger('professor_id')->nullable(); // unsignedBigInteger for foreign key
            $table->string('code', 45);
            $table->integer('section');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->tinyInteger('units');
            $table->string('day', 45);
            $table->time('start_time');
            $table->time('end_time');
            $table->string('building', 45);
            $table->string('room', 45);
            $table->string('type', 56);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('student_record_id')->references('id')->on('student_records')->onDelete('cascade');
            $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
