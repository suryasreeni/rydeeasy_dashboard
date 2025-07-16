<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel_Type extends Model
{

    protected $table = 'fuel_types';

    use HasFactory;

    protected $fillable = ['fuel_type'];
}