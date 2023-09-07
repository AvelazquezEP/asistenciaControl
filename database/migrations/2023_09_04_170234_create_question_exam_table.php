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
        Schema::create('questions_exams', function (Blueprint $table) {
            $table->id();
            $table->integer('number_of_question');
            $table->string('question');
            $table->string('option_1');
            $table->string('option_2');
            $table->string('option_3');
            $table->string('open_answer');
            $table->string('correct_answer');
            $table->string('answer_details'); //<-- administrator
            $table->timestamps();

            $table->foreignId('exam_id')->constrained(
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
        Schema::dropIfExists('question_exam');
    }
};
