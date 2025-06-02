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
        Schema::create('swimmers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->enum('religion' , ['muslim','christian'])->nullable();
            $table->string('membership_type');
            $table->string('phone');
            $table->string('whatsapp_phone');
            $table->string('father_phone');
            $table->string('educational_qualification')->nullable();
            $table->string('father_job')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('image')->nullable();
            $table->string('national_ID');
            $table->string('membership_number');
            $table->string('current_work')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('swimmers');
    }
};
