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
        Schema::create('guest_inquiries', function (Blueprint $table) {
            $table->id(); $table->string('inquiry_id')->unique();
            $table->foreignId('trek_id')->constrained('treks')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('avatar_color')->nullable();
            
            // Inquiry Details
            $table->enum('inquiry_type', ['trek_info', 'booking', 'custom', 'general', 'partnership'])->default('general');
            $table->enum('source', ['website', 'email', 'phone', 'whatsapp', 'referral', 'social'])->default('website');
            $table->text('inquiry_message');
            
            // Status & Priority
            $table->enum('status', ['new', 'contacted', 'in_progress', 'follow_up', 'converted', 'closed'])->default('new');
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->text('internal_notes')->nullable();
            
            // Follow-up Tracking
            $table->timestamp('last_contacted')->nullable();
            $table->timestamp('next_followup')->nullable();
            $table->integer('contact_count')->default(0);
            
            // Conversion
            $table->unsignedBigInteger('converted_user_id')->nullable();
            $table->timestamp('converted_at')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['inquiry_id', 'status', 'priority']);
            $table->foreign('converted_user_id')->references('id')->on('users')->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_inquiries');
    }
};
