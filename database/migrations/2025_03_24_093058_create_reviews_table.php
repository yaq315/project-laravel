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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // صاحب التقييم
            $table->foreignId('booking_id')->constrained()->onDelete('cascade'); // ربط التقييم بالحجز
            $table->integer('rating')->default(1); // التقييم (1 إلى 5)
            $table->text('review')->nullable(); // المراجعة النصية (اختياري)
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
