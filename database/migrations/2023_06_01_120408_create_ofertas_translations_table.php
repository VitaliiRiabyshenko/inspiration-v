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
        Schema::create('ofertas_translations', function (Blueprint $table) {
            // mandatory fields
			$table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
			$table->string('locale')->index();

			// Foreign key to the main model
			$table->unsignedBigInteger('ofertas_id');
			$table->unique(['ofertas_id', 'locale']);
			$table->foreign('ofertas_id')->references('id')->on('ofertas')->onDelete('cascade');

			// Actual fields you want to translate
			$table->string('title');
			$table->string('description');
            $table->longText('text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertas_translations');
    }
};
