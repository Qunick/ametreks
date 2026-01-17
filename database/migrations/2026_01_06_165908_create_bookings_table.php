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
            $table->string('booking_number')->unique();
            $table->string('trek_name');
            $table->boolean('is_offer')->default(false);
            $table->boolean('is_private')->default(false);
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('nationality');
            $table->string('passport_number');
            $table->date('date_of_birth');
            $table->string('passport_photo_path')->nullable();
            $table->date('preferred_date');
            $table->integer('group_size')->default(1);
            $table->text('special_requests')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->string('status')->default('pending'); // pending, confirmed, paid, cancelled
            $table->string('payment_status')->default('pending'); // pending, processing, completed, failed
            $table->string('payment_gateway')->nullable();
            $table->string('transaction_id')->nullable();
            $table->timestamps();
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
