<?php

use App\Models\Faculty;
use App\Models\Subject;
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
        Schema::create('faculty_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subject::class);
            $table->foreignIdFor(Faculty::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_subject');
    }
};
