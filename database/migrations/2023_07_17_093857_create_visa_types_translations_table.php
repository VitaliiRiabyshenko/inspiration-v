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
        Schema::create('visa_types_translations', function (Blueprint $table) {
            // mandatory fields
			$table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
			$table->string('locale')->index();

			// Foreign key to the main model
			$table->unsignedBigInteger('visa_types_id');
			$table->unique(['visa_types_id', 'locale']);
			$table->foreign('visa_types_id')->references('id')->on('visa_types')->onDelete('cascade');

			// Actual fields you want to translate
			$table->string('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_types_translations');
    }
};
