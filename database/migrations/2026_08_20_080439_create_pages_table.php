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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();

            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();

            $table->string('status')->default('draft');
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->string('template')->nullable();

            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();

            $table->timestamps();

            $table->index(['status', 'is_published']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
