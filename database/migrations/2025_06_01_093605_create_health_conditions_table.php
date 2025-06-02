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
        Schema::create('health_conditions', function (Blueprint $table) {
            $table->id();
            $table->decimal('weight');
            $table->decimal('height');
            $table->boolean('chronic_diseases')->nullable();
            $table->string('please_mention')->nullable();
            $table->boolean('undergoes_surgery')->nullable();
            $table->string('type_of_operation')->nullable();
            $table->boolean('sports_injuries')->nullable();
            $table->string('type_of_injury')->nullable();
            $table->foreignId('swimmer_id')->constrained('swimmers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_conditions');
    }
};
