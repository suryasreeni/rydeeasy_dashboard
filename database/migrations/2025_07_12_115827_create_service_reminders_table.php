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
        Schema::create('service_reminders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('service_task_id');

            $table->integer('time_interval')->nullable();
            $table->string('time_interval_unit')->nullable();
            $table->integer('time_threshold')->nullable();
            $table->string('time_threshold_unit')->nullable();

            $table->integer('primary_meter_interval')->nullable();
            $table->integer('primary_meter_due_soon_threshold')->nullable();

            $table->date('next_due_date')->nullable();
            $table->integer('next_due_primary_meter')->nullable();

            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->foreign('service_task_id')->references('id')->on('service_tasks')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_reminders');
    }
};