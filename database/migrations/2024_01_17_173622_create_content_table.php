<?php

use App\Models\Content;
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
        Schema::create('content', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->uuid('author_id');
            $table->enum('type', array_keys(Content::TYPES))->default('post');
            $table->string('title')->nullable();
            $table->text('body');
            $table->enum('format', array_keys(Content::FORMATS))->default('html');
            $table->enum('visibility', array_keys(Content::VISIBILITY))->default('public');
            $table->string('visibility_key')->nullable();
            $table->dateTime('publish_at')->useCurrent();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content');
    }
};
