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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->boolean('status');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();

            $table->integer('id_scheduler')->nullable();
            $table->integer('id_request')->nullable();

            // // USER > SHEDULERS
            // $table->foreign('id_scheduler')
            //     ->references('id')
            //     ->on('schedulers')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');

            // // USER > REQUESTS
            // $table->foreign('id_request')
            //     ->references('id')
            //     ->on('requests')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
