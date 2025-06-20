<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleStatus extends Model
{
    protected $table = 'statuses';
    protected $fillable = ['status_name', 'status_color'];
}