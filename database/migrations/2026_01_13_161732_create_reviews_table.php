<?php
// database/migrations/xxxx_create_reviews_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trek_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Guest name
            $table->string('email'); // Guest email
            $table->integer('rating'); // 1-5 stars
            $table->text('comment');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('location')->nullable();
            $table->string('verification_token')->nullable(); // For email verification
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};