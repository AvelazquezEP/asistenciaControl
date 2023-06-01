<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scheduler_user', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->timestamp('time_start');
            $table->timestamp('time_finish');

            $table->foreignId('id_user')->constrained(
                table: 'users',
                indexName: 'id'
            )
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedInteger('scheduler_id');
        });

        DB::statement(
            "ALTER TABLE scheduler_user ADD FOREIGN KEY (scheduler_id) REFERENCES schedulers(id) ON DELETE CASCADE"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scheduler_user');
    }
};
