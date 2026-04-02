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
        Schema::table('services', function (Blueprint $table) {
            $table->string('button_text')->nullable()->after('hero_description');
            $table->string('button_link')->nullable()->after('button_text');
            $table->boolean('open_in_new_tab')->default(false)->after('button_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['button_text', 'button_link', 'open_in_new_tab']);
        });
    }
};