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
        Schema::create('trek_departures', function (Blueprint $table) {
            $table->id();
             $table->foreignId('trek_id')->constrained()->cascadeOnDelete();

            $table->date('departure_date');
            $table->boolean('departure_is_enabled')->default(true);
            $table->decimal('price', 10, 2);
            $table->string('currency')->default('USD');
            $table->integer('spots_left')->nullable();
            $table->enum('status', ['Available','Limited','Sold Out'])->default('Available');
            $table->boolean('is_guaranteed')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trek_departures');
    }
};
