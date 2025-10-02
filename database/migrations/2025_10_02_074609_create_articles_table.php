<?php

use App\Enums\ArticleCategory;
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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            // $table->text('excerpt');
            $table->longText('content');
            $table->enum('category', ArticleCategory::values());
            $table->tinyInteger('trimester');
            $table->string('thumbnail')->nullable();
            $table->enum('status', ['Published', 'Draft'])->default('Draft');
            $table->string('author1');
            $table->string('author2')->nullable();
            $table->string('author3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
