<?php

namespace App\Models;
use App\Models\VehicleStatus;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

    protected $table = 'vehicles';
    protected $fillable = [
        'vin',
        'vehicle_name',
        'vehicle_type',
        'model',
        'year',
        'status_id',
        'ownership',
        'group',
        'vehicle_image',
        'in_service_date',
        'in_service_odometer',
        'out_of_service_date',
        'out_of_service_odometer',
        'purchase_vendor',
        'purchase_date',
        'odometer',
        'purchase_price',
        'purchase_type',
        'lender',
        'date_of_loan',
        'amount_of_loan',
        'annual_percentage_rate',
        'down_payment',
        'first_payment_date',
        'monthly_payment',
        'number_of_payment',
        'loan_end_date',
        'account_number'

    ];

    // Optional: define relationship with status
    public function status()
    {
        return $this->belongsTo(VehicleStatus::class);
    }
}