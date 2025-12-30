<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('greeting_cards', function (Blueprint $table) {
            $table->id();
            $table->string('image'); 
            $table->string('text', 1000); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('greeting_cards');
    }
};
