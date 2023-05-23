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
        Schema::create('post_homes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('picture');
            $table->string('description');
            $table->timestamps();
            // $table->img('picture');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_home');
    }
};