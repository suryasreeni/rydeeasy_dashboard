<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTask extends Model
{

    protected $table = 'service_tasks';
    use HasFactory;

    protected $fillable = [
        'service_task_name',
    ];
}