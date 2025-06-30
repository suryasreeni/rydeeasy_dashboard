<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_id',
        'contact',
        'address',
        'booking_details',
        'reference_number',
        'expected_return',
        'purpose',
        'vin',
        'status',
        'model',
        'yard',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'start_km',
        'end_km',
        'start_fuel',
        'start_fuel_unit',
        'end_fuel',
        'end_fuel_unit',
        'deposit_given',
        'rent_given',
        'gst_given',
        'km_given',
        'hour_given',
        'other_given',
        'total_given',
        'deposit_final',
        'rent_final',
        'gst_final',
        'km_final',
        'hour_final',
        'other_final',
        'total_final',
        'driving_license',
        'document_collected',
        'documents_collected',
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
        'expected_return' => 'datetime',
        'start_date' => 'date',
        'end_date' => 'date',
        'documents_collected' => 'array',
        'document_images' => 'array',
        'deposit_given' => 'decimal:2',
        'rent_given' => 'decimal:2',
        'gst_given' => 'decimal:2',
        'km_given' => 'decimal:2',
        'hour_given' => 'decimal:2',
        'other_given' => 'decimal:2',
        'total_given' => 'decimal:2',
        'deposit_final' => 'decimal:2',
        'rent_final' => 'decimal:2',
        'gst_final' => 'decimal:2',
        'km_final' => 'decimal:2',
        'hour_final' => 'decimal:2',
        'other_final' => 'decimal:2',
        'total_final' => 'decimal:2',
        'cash_hand' => 'decimal:2',
        'cash_account' => 'decimal:2',
        'total_received' => 'decimal:2',
        'refund_amount' => 'decimal:2',
    ];

    public function contacts()
    {
        return $this->belongsTo(ContactForm::class, 'contact_id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vin', 'vin');
    }

    public function statusRelation()
    {
        return $this->belongsTo(VehicleStatus::class, 'status');
    }

    // Helper methods
    public function getYardNameAttribute()
    {
        return $this->yard === 0 ? 'Malappuram' : 'Kochi';
    }
}