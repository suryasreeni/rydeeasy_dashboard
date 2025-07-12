<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RenewalType extends Model
{
    //service_renewal_name
    protected $table = 'renewal_types';
    use HasFactory;

    protected $fillable = [
        'service_renewal_name',
    ];
}