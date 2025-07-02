<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTask extends Model
{
    // Specify the exact table name
    protected $table = 'service_tasks';

    protected $fillable = ['service_task_name'];
}