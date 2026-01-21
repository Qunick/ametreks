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
        Schema::create('treks', function (Blueprint $table) {
            $table->id();
             $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->foreignId('region_id')->nullable()->constrained()->nullOnDelete();
            // $table->foreignId('trek_type_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_bookable')->default(true);
            $table->boolean('noindex')->default(false);
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('title');
            $table->text('short_desc')->nullable();
            $table->longText('overview')->nullable();
            $table->integer('duration_days')->nullable();
            $table->enum('difficulty', ['Easy','Moderate','Hard'])->nullable();
            $table->integer('max_altitude')->nullable();
            $table->string('best_season')->nullable();
            $table->decimal('base_price', 10, 2)->nullable();
            $table->string('currency')->default('USD');
            $table->string('main_image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('video_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treks');
    }
};
