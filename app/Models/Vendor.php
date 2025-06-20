<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    // Explicitly define the table
    protected $table = 'vendors';

    protected $fillable = [
        'name',
        'email',
        'website',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'country',
        'contact_name',
        'contact_email',
        'contact_phone',
        'is_charging',
        'is_tools',
        'is_fuel',
        'is_service',
        'is_vehicle',
    ];
}