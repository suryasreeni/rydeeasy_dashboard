<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceReminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'service_task_id',
        'time_interval',
        'time_interval_unit',
        'time_threshold',
        'time_threshold_unit',
        'primary_meter_interval',
        'primary_meter_due_soon_threshold',
        'next_due_date',
        'current_reading',
        'next_due_primary_meter',
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

?>