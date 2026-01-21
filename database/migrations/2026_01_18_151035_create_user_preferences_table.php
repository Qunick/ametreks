<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('email_notifications')->default(true);
            $table->boolean('sms_notifications')->default(false);
            $table->boolean('newsletter')->default(true);
            $table->boolean('show_profile')->default(true);
            $table->enum('group_type_preference', ['same_gender', 'mixed', 'no_preference'])->default('no_preference');
            $table->integer('preferred_group_size')->nullable();
            $table->json('preferred_trek_types')->nullable();
            $table->json('avoided_trek_types')->nullable();
            $table->unique('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_preferences');
    }
};