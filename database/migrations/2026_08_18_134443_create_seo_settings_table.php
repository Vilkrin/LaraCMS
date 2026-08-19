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
        Schema::create('seo_settings', function (Blueprint $table) {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Primary SEO
            |--------------------------------------------------------------------------
            */
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_author')->nullable();
            $table->string('canonical_url')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Search & AI Crawlers
            |--------------------------------------------------------------------------
            */
            $table->boolean('allow_search_indexing')->default(true);
            $table->boolean('allow_ai_search')->default(true);
            $table->boolean('allow_ai_training')->default(false);

            /*
            |--------------------------------------------------------------------------
            | Open Graph
            |--------------------------------------------------------------------------
            */
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_type')->default('website');
            $table->string('og_site_name')->nullable();
            $table->string('og_locale')->default('en_GB');

            /*
            |--------------------------------------------------------------------------
            | Twitter / X
            |--------------------------------------------------------------------------
            */
            $table->string('twitter_card')->default('summary_large_image');
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_site')->nullable();
            $table->string('twitter_creator')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Misc
            |--------------------------------------------------------------------------
            */
            $table->string('theme_color')->default('#0f172a');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_settings');
    }
};
