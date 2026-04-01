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
        Schema::create('insights', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->string('outlook_title')->nullable();
            $table->longText('outlook_description')->nullable();

            $table->string('why_title')->nullable();
            $table->longText('why_description')->nullable();

            $table->string('optimistic_title')->nullable();
            $table->longText('optimistic_description')->nullable();

            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->dateTime('publish_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insights');
    }
};