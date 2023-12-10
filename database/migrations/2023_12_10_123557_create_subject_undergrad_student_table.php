<?php

use App\Models\Subject;
use App\Models\GradStudent;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subject_grad_student', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(GradStudent::class);
            $table->foreignIdFor(Subject::class);
            $table->float('grade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_grad_student');
    }
};
