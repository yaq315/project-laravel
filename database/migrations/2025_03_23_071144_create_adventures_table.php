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
        Schema::create('adventures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description'); 
            $table->decimal('price', 8, 2); 
            $table->string('image')->nullable(); 
            $table->string('type'); 
            $table->integer('max_group_size')->nullable(); 
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable(); 
            $table->integer('duration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { Schema::table('adventures', function (Blueprint $table) {
        $table->dropColumn(['start_date', 'end_date', 'duration']);
    });
    }
};
