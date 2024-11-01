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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId ('user_id');
            $table->foreignId('category_id');
            $table->string ('title');
            $table->string('author');
            $table->string('pages');
            $table->enum('status', ['available', 'unavailable'])->default('available'); // Example statuses
            $table->text('description'); // Changed to text for larger content
            $table->string('cover_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
