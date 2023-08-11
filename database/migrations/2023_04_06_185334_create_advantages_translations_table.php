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
        Schema::create('advantages_translations', function (Blueprint $table) {
            // mandatory fields
			$table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
			$table->string('locale')->index();

			// Foreign key to the main model
			$table->unsignedBigInteger('advantages_id');
			$table->unique(['advantages_id', 'locale']);
			$table->foreign('advantages_id')->references('id')->on('advantages')->onDelete('cascade');

			// Actual fields you want to translate
			$table->string('title');
			$table->longText('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advantages_translations');
    }
};
