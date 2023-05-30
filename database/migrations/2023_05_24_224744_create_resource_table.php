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
            $table->string('title');
            $table->unsignedBigInteger('id_category');
            $table->string('description');
            $table->text('resource_file');
            $table->text('path_resource');
            $table->text('extension_resource');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('id_category')
                ->references('id') // permission id
                ->on('resource_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
