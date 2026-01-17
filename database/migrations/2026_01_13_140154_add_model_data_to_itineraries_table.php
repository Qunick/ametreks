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
        Schema::table('trek_itineraries', function (Blueprint $table) {
           $table->string('overnight')->nullable()->after('pro_tip');
            $table->string('duration')->nullable()->after('overnight');
            $table->string('distance')->nullable()->after('duration');
            $table->json('highlight')->nullable()->after('distance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trek_itineraries', function (Blueprint $table) {
            $table->dropColumn(['overnight', 'duration', 'distance', 'highlight']);
        });
    }
};
