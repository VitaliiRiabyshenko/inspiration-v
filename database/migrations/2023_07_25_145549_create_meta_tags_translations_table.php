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
        Schema::create('meta_tags_translations', function (Blueprint $table) {
            // mandatory fields
			$table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
			$table->string('locale')->index();

			// Foreign key to the main model
			$table->unsignedBigInteger('meta_tags_id');
			$table->unique(['meta_tags_id', 'locale']);
			$table->foreign('meta_tags_id')->references('id')->on('meta_tags')->onDelete('cascade');

			// Actual fields you want to translate
			$table->string('title');
            $table->string('description');
            $table->string('keywords')->nullable();
            $table->string('lang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta_tags_translations');
    }
};
