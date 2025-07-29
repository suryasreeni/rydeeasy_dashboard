<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasurementUnit extends Model
{
    protected $table = 'measurement_unit';
    protected $fillable = ['measurement_unit_name'];
}