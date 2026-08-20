<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Menu;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Main Navbar, Footer
            $table->string('slug')->unique(); // main-navbar, footer
            $table->string('location')->unique(); // main_navbar, footer
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Menu::create([
            'name' => 'Main Navbar',
            'slug' => 'main-navbar',
            'location' => 'main_navbar',
            'is_active' => true,
        ]);

        Menu::create([
            'name' => 'Footer',
            'slug' => 'footer',
            'location' => 'footer',
            'is_active' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
