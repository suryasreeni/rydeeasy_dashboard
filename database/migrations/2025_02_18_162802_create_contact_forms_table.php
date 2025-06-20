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
        Schema::create('contact_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('email');
            $table->string('group');
            $table->string('filename')->nullable();
            $table->boolean('is_operator')->default(false);
            $table->boolean('is_technician')->default(false);
            $table->boolean('is_employee')->default(false);
            $table->string('mobile');

            $table->string('other_mobile');
            $table->string('address1');

            $table->string(column: 'address2');
            $table->string(column: 'city');
            $table->string(column: 'state');
            $table->string(column: 'pincode');

            $table->string(column: 'country');
            $table->string(column: 'jobtitle');

            $table->string(column: 'dob');
            $table->string(column: 'empnum');

            $table->string(column: 'startdate');
            $table->string(column: 'leavedate');
            $table->string(column: 'licensenum');

            $table->string(column: 'licenseclass');
            $table->string(column: 'licensestate');

            $table->string(column: 'labourrate');

            $table->string(column: 'samlid');











            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_forms');
    }
};