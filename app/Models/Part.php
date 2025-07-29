<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'part_no',
        'part_category',
        'part_name',
        'measurement_unit',
        'part_qty',
        'price_per_unit',
        'total_price',
        'vendor_type',
        'vendor_id',
        'vendor_name',
        'vendor_address',
        'vendor_phone',
        'purchase_date',
        'part_color',
        'part_status',
        'part_photo',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}