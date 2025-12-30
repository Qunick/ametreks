<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();

            $table->boolean('greeting_is_enabled')->default(true);
            $table->string('greeting_text')->nullable();
            $table->boolean('section_is_hide')->default(false);

            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();

            $table->json('changing_text')->nullable();

            $table->json('faq_questions_answer')->nullable();

            $table->json('associated_with_images')->nullable();
            $table->json('ame_awards')->nullable();

            $table->text('footer_text')->nullable();

            $table->json('social_media_links')->nullable();
            $table->json('social_media_icons')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_settings');
    }
};