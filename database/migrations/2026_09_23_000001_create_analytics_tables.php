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
        Schema::create('analytics_page_visits', function (Blueprint $table) {
            $table->id();
            $table->string('url', 500);
            $table->string('route_name')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('device', 50)->nullable(); // mobile, tablet, desktop
            $table->string('referer', 500)->nullable();
            $table->date('visit_date')->index();
            $table->timestamp('visited_at')->index();
            $table->timestamps();
        });

        Schema::create('analytics_link_clicks', function (Blueprint $table) {
            $table->id();
            $table->string('link_label', 255);
            $table->string('link_url', 500);
            $table->string('page_url', 500)->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('device', 50)->nullable();
            $table->date('click_date')->index();
            $table->timestamp('clicked_at')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_link_clicks');
        Schema::dropIfExists('analytics_page_visits');
    }
};
