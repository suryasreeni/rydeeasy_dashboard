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

            // Customer info
            $table->string('name');
            $table->string('contact');
            $table->string('address');

            // Vehicle info
            $table->string('vin');
            $table->unsignedBigInteger('status');
            $table->string('model')->nullable();
            $table->string('yard')->nullable();

            // Rental period
            $table->dateTime('rental_start')->nullable();
            $table->dateTime('rental_end')->nullable();
            $table->dateTime('expected_return')->nullable();

            // Booking info
            $table->string('booking_details')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('purpose')->nullable();

            // Vehicle condition
            $table->integer('start_km')->nullable();
            $table->integer('end_km')->nullable();
            $table->decimal('start_fuel', 8, 2)->nullable();
            $table->string('start_fuel_unit')->nullable();
            $table->decimal('end_fuel', 8, 2)->nullable();
            $table->string('end_fuel_unit')->nullable();

            // Rent details
            $table->decimal('deposit_given', 10, 2)->nullable();
            $table->decimal('deposit_final', 10, 2)->nullable();
            $table->decimal('rent_given', 10, 2)->nullable();
            $table->decimal('rent_final', 10, 2)->nullable();
            $table->decimal('gst_given', 10, 2)->nullable();
            $table->decimal('gst_final', 10, 2)->nullable();
            $table->decimal('km_given', 10, 2)->nullable();
            $table->decimal('km_final', 10, 2)->nullable();
            $table->decimal('hour_given', 10, 2)->nullable();
            $table->decimal('hour_final', 10, 2)->nullable();
            $table->decimal('other_given', 10, 2)->nullable();
            $table->decimal('other_final', 10, 2)->nullable();
            $table->decimal('total_given', 10, 2)->nullable();
            $table->decimal('total_final', 10, 2)->nullable();

            // Driver & documents
            $table->string('driving_license')->nullable();
            $table->string('document_collected')->nullable();
            $table->text('docs')->nullable(); // JSON of checkboxes
            $table->string('document_number')->nullable();

            // Payment details
            $table->decimal('cash_hand', 10, 2)->nullable();
            $table->decimal('cash_account', 10, 2)->nullable();
            $table->decimal('total_received', 10, 2)->nullable();

            // Account & refund
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->decimal('refund_amount', 10, 2)->nullable();

            // Document uploads
            $table->text('document_images')->nullable(); // JSON-encoded array of paths

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}