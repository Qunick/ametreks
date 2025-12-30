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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_greetingCard_enabled')->default(true);
            $table->boolean('is_trek_enabled')->default(true);
            $table->boolean('is_section_enabled')->default(true);
            $table->boolean('is_departure_enabled')->default(true);
            $table->boolean('is_booking_enabled')->default(true);
            $table->boolean('is_reviews_enabled')->default(true);
            $table->boolean('is_blog_enabled')->default(true);
            $table->boolean('is_maintenance_mode')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
