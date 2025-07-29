<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartCategory extends Model
{
    protected $table = 'part_categories';
    protected $fillable = ['part_category_name'];
}