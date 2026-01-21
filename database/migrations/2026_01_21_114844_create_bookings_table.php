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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
             $table->string('booking_id')->unique(); // TRK-2024-001
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->foreignId('trek_id')->constrained('treks')->cascadeOnDelete();
            
            // Customer Details
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('customer_country')->nullable();
            
            // Trek Details
            $table->string('trek_name');
            $table->string('trek_duration');
            $table->date('trek_date');
            
            // Booking Details
            $table->integer('travelers')->default(1);
            $table->decimal('amount', 10, 2);
            $table->decimal('per_person_cost', 10, 2)->nullable();
            
            // Status
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            
            // Additional Info
            $table->text('special_requests')->nullable();
            $table->string('cancellation_reason')->nullable();
            $table->text('cancellation_notes')->nullable();
            $table->boolean('notification_sent')->default(false);
            
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamp('paid_at')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index('customer_id');
            $table->index('trek_id');
            $table->index('status');
            $table->index('payment_status');
            $table->index('trek_date');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
