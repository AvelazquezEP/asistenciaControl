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
        Schema::create('exam_item', function (Blueprint $table) {
            $table->id();
            $table->string('number_of_questions');
            $table->timestamps();

            $table->foreignId('id_resource_exam')->constrained(
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
        Schema::dropIfExists('exam_item');
    }
};
