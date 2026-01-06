<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('forecasts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->decimal('temperature', 5, 2);
            $table->date('date');
            $table->timestamps();

            $table->index(['city_id', 'date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forecasts');
    }
};
