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
        Schema::table('general_information', function (Blueprint $table) {
            $table->string('google_map_link')->nullable()->after('address');
            $table->string('header_logo')->nullable()->after('ticktok_link');
            $table->string('footer_logo')->nullable()->after('header_logo');
            $table->text('footer_description')->nullable()->after('footer_logo');
            $table->string('trademark_line')->nullable()->after('footer_description');
            $table->string('privacy_link')->nullable()->after('trademark_line');
            $table->string('cookie_policy_link')->nullable()->after('privacy_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('general_information', function (Blueprint $table) {
            $table->dropColumn([
                'google_map_link',
                'header_logo',
                'footer_logo',
                'footer_description',
                'trademark_line',
                'privacy_link',
                'cookie_policy_link',
            ]);
        });
    }
};
