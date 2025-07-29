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
        Schema::create('fuel_entries', function (Blueprint $table) {
            $table->id();
            $table->date('fuel_entry_date')->nullable();
            $table->string('fuel_vehicle')->nullable(); // VIN
            $table->string('fuel_vehicle_name')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('fuel_station')->nullable();
            $table->decimal('per_ltr_price', 8, 2)->nullable();
            $table->decimal('qty_in_ltr', 8, 2)->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->string('fuel_odometer')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('document_path')->nullable(); // For file upload
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_entries');
    }
};