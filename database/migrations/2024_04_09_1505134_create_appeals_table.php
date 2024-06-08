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
        Schema::create('appeals', function (Blueprint $table) {
            $table->id();
            // $table->integer('student_no'); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->string('subject');
            $table->text('message');
            $table->string('filepath')->nullable(); // Use string for file paths
            $table->text('remarks')->nullable();
            $table->string('viewed')->nullable();
            $table->timestamps();
            $table->foreignId('student_no')->references('student_no')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appeals');
    }
};
