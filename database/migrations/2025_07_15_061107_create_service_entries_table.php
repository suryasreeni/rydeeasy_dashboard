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
        Schema::create('service_entries', function (Blueprint $table) {
            $table->id();
            $table->string('service_vehicle');
            $table->date('serviced_on');
            $table->integer('service_odometer');
            $table->json('completed_task')->nullable();
            $table->json('resolved_issues')->nullable();
            $table->string('vendor')->nullable();
            $table->text('service_comment')->nullable();
            $table->decimal('labour', 10, 2)->nullable();
            $table->decimal('parts', 10, 2)->nullable();
            $table->decimal('tax', 5, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('filename')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_entries');
    }
};