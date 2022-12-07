<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'service_name',
        'service_category',
        'service_charge',
        'tracking_number',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
