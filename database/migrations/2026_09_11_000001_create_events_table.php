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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('Worship'); // Worship, Fellowship, Youth, Special
            $table->text('description');
            $table->string('schedule_info'); // e.g. "Setiap Jumat Minggu ke-4", "25 Oktober 2026"
            $table->string('time_info')->default('19:00 WIB');
            $table->string('location')->default('Gereja Ekklesia Surabaya - Jln Ruko Ngaglik 2 No 15');
            $table->string('image_url')->nullable();
            $table->string('badge')->nullable(); // e.g. "Rutin", "Upcoming", "Highlight"
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
