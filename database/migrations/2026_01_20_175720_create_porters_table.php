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
        Schema::create('porters', function (Blueprint $table) {
            $table->id(); $table->string('porter_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('avatar_color')->nullable();
            
            // Professional Information
            $table->integer('years_experience')->default(0);
            $table->json('languages')->nullable();
            $table->integer('max_load_capacity')->default(25); // in kg
            $table->decimal('rating', 3, 2)->default(0);
            
            // Availability
            $table->enum('availability_status', ['available', 'assigned', 'on_leave', 'inactive'])->default('available');
            $table->date('leave_start')->nullable();
            $table->date('leave_end')->nullable();
            
            // Emergency Contact
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            
            // Statistics
            $table->integer('total_treks')->default(0);
            $table->integer('completed_treks')->default(0);
            $table->decimal('average_rating', 3, 2)->default(0);
            
            $table->timestamp('last_assignment')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['porter_id', 'availability_status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('porters');
    }
};
