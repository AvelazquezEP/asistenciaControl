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
        Schema::create('resource_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('Description');
            $table->text('icon');
            $table->boolean('status');
            $table->timestamps();
        });

        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // $table->unsignedBigInteger('id_category');
            $table->string('description');
            $table->text('resource_file');
            $table->text('path_resource');
            $table->text('extension_resource');
            $table->boolean('status');
            $table->timestamps();

            $table->integer('id_category');

            // $table->foreign('id_category')
            //     ->references('id') // permission id
            //     ->on('resource_categories')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resource_categories');
        Schema::dropIfExists('resources');
    }
};
