<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'user_phone',
        'user_address',
        'city',
        'state',
        'country',
        'pincode',
        'order_id',
        'payment_id',
        'status',
        'remark',
    ];
}
