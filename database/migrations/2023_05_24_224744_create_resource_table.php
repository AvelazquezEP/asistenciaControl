<?php

use App\Models\resource_categories;
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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('id_category')->nullable();

            $table->string('title');
            $table->string('description');
            $table->text('resource_file');
            $table->text('path_resource');
            $table->text('extension_resource');
            $table->boolean('status');
            // $table->string('role');
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users');

            // $table->foreign('id_category')->references('id')->on('resource_category');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
