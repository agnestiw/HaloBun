<?php

use App\Enums\VideoPlatform;
use App\Enums\VideoTopic;
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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('topic', VideoTopic::values());
            $table->enum('platform', VideoPlatform::values());
            $table->tinyInteger('trimester');
            $table->text('video_id')->nullable();
            $table->text('url')->nullable();
            $table->text('thumbnail')->nullable();
            $table->string('duration')->nullable(); 
            $table->string('author')->nullable();
            $table->enum('status', ['Published', 'Draft'])->default('Draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
