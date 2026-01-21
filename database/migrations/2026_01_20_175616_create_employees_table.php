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
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); $table->string('employment_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('avatar_color')->nullable();
            $table->text('avatar_image')->nullable();
            
            // Job Information
            $table->enum('department', ['operations', 'sales', 'guides', 'finance', 'admin', 'it'])->default('operations');
            $table->enum('role', ['admin', 'manager', 'supervisor', 'staff'])->default('staff');
            $table->date('joined_date');
            
            // Status
            $table->enum('status', ['active', 'on_leave', 'inactive'])->default('active');
            $table->timestamp('last_active')->nullable();
            
            // Leave Management
            $table->date('leave_start')->nullable();
            $table->date('leave_end')->nullable();
            $table->text('leave_reason')->nullable();
            
            // Permissions (JSON for flexibility)
            $table->json('permissions')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index(['employment_id', 'department', 'role', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
