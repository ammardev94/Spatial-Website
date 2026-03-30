<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('type')->default('1');
            $table->string('title');
            $table->string('slug');
            $table->string('page_title');
            $table->longText('page_description');
            $table->text('visibility')->nullable();
            $table->string('status')->default('1');
            $table->string('canonical_url');
            $table->string('has_meta')->nullable();
            $table->unsignedBigInteger('added_by');
            $table->timestamps();
            $table->string('deleted_at')->nullable();

            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
