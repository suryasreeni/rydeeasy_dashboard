<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuelEntry extends Model
{

    protected $table = 'fuel_entries';
    protected $fillable = [
        'fuel_entry_date',
        'fuel_vehicle',
        'fuel_vehicle_name',
        'fuel_type',
        'fuel_station',
        'per_ltr_price',
        'qty_in_ltr',
        'total_amount',
        'fuel_odometer',
        'invoice_number',
        'invoice_photo',
    ];

}