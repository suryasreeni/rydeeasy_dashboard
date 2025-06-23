<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();

            // Customer Information
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->string('contact', 20);
            $table->text('address')->nullable();

            // Booking Details
            $table->string('booking_details', 500)->nullable();
            $table->string('reference_number', 100)->nullable();
            $table->dateTime('expected_return')->nullable();
            $table->string('purpose', 255)->nullable();

            // Vehicle Information
            $table->string('vin', 50);
            $table->unsignedInteger('status')->nullable();
            $table->string('model', 100)->nullable();
            $table->tinyInteger('yard')->nullable(); // 0=Malappuram, 1=Kochi

            // Rental Period
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date')->nullable();
            $table->time('end_time')->nullable();

            // Vehicle Condition
            $table->unsignedInteger('start_km')->nullable();
            $table->unsignedInteger('end_km')->nullable();
            $table->decimal('start_fuel', 8, 2)->nullable();
            $table->enum('start_fuel_unit', ['L', 'Gallons', '%'])->default('L');
            $table->decimal('end_fuel', 8, 2)->nullable();
            $table->enum('end_fuel_unit', ['L', 'Gallons', '%'])->default('L');

            // Rent Details (Given amounts)
            $table->decimal('deposit_given', 10, 2)->default(0.00);
            $table->decimal('rent_given', 10, 2)->default(0.00);
            $table->decimal('gst_given', 10, 2)->default(0.00);
            $table->decimal('km_given', 10, 2)->default(0.00);
            $table->decimal('hour_given', 10, 2)->default(0.00);
            $table->decimal('other_given', 10, 2)->default(0.00);
            $table->decimal('total_given', 10, 2)->default(0.00);

            // Rent Details (Final amounts)
            $table->decimal('deposit_final', 10, 2)->default(0.00);
            $table->decimal('rent_final', 10, 2)->default(0.00);
            $table->decimal('gst_final', 10, 2)->default(0.00);
            $table->decimal('km_final', 10, 2)->default(0.00);
            $table->decimal('hour_final', 10, 2)->default(0.00);
            $table->decimal('other_final', 10, 2)->default(0.00);
            $table->decimal('total_final', 10, 2)->default(0.00);

            // Driver & Documents
            $table->string('driving_license', 50)->nullable();
            $table->enum('document_collected', ['Yes', 'No'])->nullable();
            $table->json('documents_collected')->nullable(); // For checkbox array
            $table->string('document_number', 100)->nullable();

            // Payment Details
            $table->decimal('cash_hand', 10, 2)->default(0.00);
            $table->decimal('cash_account', 10, 2)->default(0.00);
            $table->decimal('total_received', 10, 2)->default(0.00);

            // Account Details & Refund
            $table->string('account_name', 100)->nullable();
            $table->string('account_number', 50)->nullable();
            $table->string('ifsc_code', 20)->nullable();
            $table->decimal('refund_amount', 10, 2)->default(0.00);

            // File paths for uploaded documents
            $table->json('document_images')->nullable();

            $table->timestamps();

            // Indexes for better performance (NO FOREIGN KEYS)
            $table->index('contact_id');
            $table->index(['vin', 'start_date']);
            $table->index('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}