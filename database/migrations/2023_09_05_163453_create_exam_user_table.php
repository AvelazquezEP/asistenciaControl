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
        Schema::create('exam_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('department');
            $table->string('control_number');
            $table->string('correct_answer');
            $table->string('incorrect_answer');
            $table->string('empty_answer');
            $table->string('exam_name');
            $table->timestamps();

            $table->foreignId('id_exam')->constrained(
                table: 'exams',
                indexName: 'id'
            )
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_user');
    }
};
