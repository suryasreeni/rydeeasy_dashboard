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
        Schema::create('parts', function (Blueprint $table) {
            $table->id();

            $table->string('part_no')->unique();
            $table->string('part_category');
            $table->string('part_name');
            $table->string('measurement_unit');
            $table->integer('part_qty');
            $table->decimal('price_per_unit', 10, 2);
            $table->decimal('total_price', 10, 2);

            $table->enum('vendor_type', ['regular', 'other']);
            $table->unsignedBigInteger('vendor_id')->nullable(); // Regular vendor (FK)
            $table->string('vendor_name')->nullable();           // For other vendor
            $table->string('vendor_address')->nullable();
            $table->string('vendor_phone')->nullable();

            $table->date('purchase_date');
            $table->string('part_color')->nullable();
            $table->enum('part_status', ['active', 'inactive']);
            $table->string('part_photo')->nullable();

            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors')->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parts');
    }
};