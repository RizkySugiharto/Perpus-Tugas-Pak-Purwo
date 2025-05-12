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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->nullable()->constrained()->nullOnUpdate()->nullOnDelete();
            $table->foreignId('employee_id')->nullable()->constrained('users', 'id')->nullOnUpdate()->nullOnDelete();
            $table->foreignId('student_id')->nullable()->constrained('users', 'id')->nullOnUpdate()->nullOnDelete();
            $table->string('book_title', 255);
            $table->string('employee_name');
            $table->string('student_name');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
