<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('service_section_items', function (Blueprint $table) {
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->boolean('open_in_new_tab')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_section_items', function (Blueprint $table) {
            $table->dropColumn(['button_text', 'button_link', 'open_in_new_tab']);
        });
    }
};