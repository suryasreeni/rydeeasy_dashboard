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
        'fueltype',
        'year',
        'status_id',
        'group',
        'engine_no',
        'chassis_no',
        'owner',
        'location',
        'brand_id',
        'model_id',
        'vehicle_tyre_size',
        'vehicle_tons',
        'odometer_reading',
        'insurance_no',
        'insurance_start_date',
        'insurance_end_date',
        'roadtex_no',
        'roadtex_last_date',
        'permit_no',
        'permit_last_date',
        'puc_no',
        'puc_last_date',
        'registration_no',
        'registration_valid_from',
        'registration_valid_to',
        'state_permit_start_date',
        'state_permit_end_date',
        'national_permit_start_date',
        'national_permit_end_date',
        'fitness_certificate_start_date',
        'fitness_certificate_end_date',
        'explosive_certificate_start_date',
        'explosive_certificate_end_date',
        'enviornment_tax_start_date',
        'enviornment_tax_end_date',
        'vehicle_image'



    ];

    // Optional: define relationship with status
    public function status()
    {
        return $this->belongsTo(VehicleStatus::class, 'status_id');
    }

    // In Vehicle.php
    public function brand()
    {
        return $this->belongsTo(VehicleBrand::class);
    }

    public function model()
    {
        return $this->belongsTo(VehicleModel::class, 'model_id');
    }


}