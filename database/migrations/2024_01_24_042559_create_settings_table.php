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
        Schema::create('settings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('context')->nullable();
            $table->string('key');
            $table->text('value');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('settings', function(Blueprint $table) {
            $table->unique(['key', 'context']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropUnique(['key', 'context']);
        });

        Schema::dropIfExists('settings');
    }
};
