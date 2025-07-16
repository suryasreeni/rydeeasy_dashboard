<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    protected $fillable = ['brand_id', 'model_name'];

    public function brand()
    {
        return $this->belongsTo(VehicleBrand::class, 'brand_id');
    }
}