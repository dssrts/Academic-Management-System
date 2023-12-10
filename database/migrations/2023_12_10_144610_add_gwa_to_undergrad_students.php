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
        Schema::table('undergrad_students', function (Blueprint $table) {
            $table->float('GWA')->nullable();
        });
        Schema::table('grad_students', function (Blueprint $table) {
            $table->float('GWA')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('undergrad_students', function (Blueprint $table) {
            $table->dropColumn('GWA');
        });
        Schema::table('grad_students', function (Blueprint $table) {
            $table->dropColumn('GWA');
        });
    }
};
