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
        Schema::create('staff_assignments', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('trek_id')->constrained('treks')->onDelete('cascade');
            $table->morphs('assignable'); // Can be Guide or Porter
            
            // Assignment Details
            $table->date('start_date');
            $table->date('end_date');
            $table->string('role'); // e.g., Lead Guide, Assistant Porter
            $table->decimal('daily_rate', 10, 2);
            $table->text('notes')->nullable();
            
            // Notifications
            $table->boolean('whatsapp_sent')->default(false);
            $table->boolean('email_sent')->default(false);
            $table->boolean('calendar_added')->default(false);
            
            // Status
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['trek_id', 'status']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_assignments');
    }
};
