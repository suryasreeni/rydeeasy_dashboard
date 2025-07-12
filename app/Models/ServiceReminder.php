<?php
// app/Models/ServiceReminder.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ServiceReminder extends Model
{
    protected $fillable = [
        'vehicle_id',
        'service_task_id',
        'time_interval',
        'time_interval_unit',
        'time_threshold',
        'time_threshold_unit',
        'next_due_date',
        'primary_meter_interval',
        'primary_meter_due_soon_threshold',
        'next_due_primary_meter'
    ];

    protected $casts = [
        'next_due_date' => 'date',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function serviceTask()
    {
        return $this->belongsTo(ServiceTask::class);
    }
}