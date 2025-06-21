<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = 'assignments';

    protected $fillable = [
        'name',
        'contact',
        'address',
        'vin',
        'status',
        'rental_start',
        'rental_end',
        'booking_details',
        'reference_number',
        'expected_return',
        'purpose',
        'model',
        'yard',
        'start_km',
        'end_km',
        'start_fuel',
        'start_fuel_unit',
        'end_fuel',
        'end_fuel_unit',
        'deposit_given',
        'deposit_final',
        'rent_given',
        'rent_final',
        'gst_given',
        'gst_final',
        'km_given',
        'km_final',
        'hour_given',
        'hour_final',
        'other_given',
        'other_final',
        'total_given',
        'total_final',
        'driving_license',
        'document_collected',
        'docs',
        'document_number',
        'cash_hand',
        'cash_account',
        'total_received',
        'account_name',
        'account_number',
        'ifsc_code',
        'refund_amount',
        'document_images'
    ];

    protected $casts = [
        'docs' => 'array',
        'document_images' => 'array',
        'expected_return' => 'datetime',
        'rental_start' => 'datetime',
        'rental_end' => 'datetime',
    ];
}