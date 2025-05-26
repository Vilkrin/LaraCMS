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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Text shown in the menu
            $table->string('url')->nullable(); // URL to link to
            $table->unsignedBigInteger('parent_id')->nullable(); // Nesting support
            $table->unsignedInteger('order')->default(0); // Drag-and-drop sort position
            $table->string('target')->nullable(); // _blank or _self
            $table->string('icon_class')->nullable(); // Optional icon class (e.g., for FontAwesome)
            $table->string('menu_group')->default('primary'); // 'primary', 'footer', etc.
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('menu_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
