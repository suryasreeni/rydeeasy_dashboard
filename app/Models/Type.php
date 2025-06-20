<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // Specify the exact table name
    protected $table = 'types';

    protected $fillable = ['type_name'];
}