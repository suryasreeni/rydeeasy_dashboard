<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Service.php
class Service_Entry extends Model
{

    protected $table = 'service_entries';

    protected $fillable = [
        'service_vehicle',
        'serviced_on',
        'service_odometer',
        'completed_task',
        'resolved_issues',
        'vendor',
        'service_comment',
        'labour',
        'parts',
        'tax',
        'total',
        'invoice_number',
        'filename',
    ];

    protected $casts = [
        'completed_task' => 'array',
        'resolved_issues' => 'array',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'service_vehicle', 'vin');
    }

}