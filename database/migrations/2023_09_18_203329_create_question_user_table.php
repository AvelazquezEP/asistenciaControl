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
        Schema::create('questions_users', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('answer');
            $table->string('id_question');
            $table->string('exam_id');
            $table->string('correct_answer');
            $table->string('exam_name');
            $table->string('control_number');
            $table->string('answer_result');
            $table->timestamps();

            $table->foreignId('id_exam_user')->constrained(
                table: 'exam_users',
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
        Schema::dropIfExists('question_user');
    }
};
