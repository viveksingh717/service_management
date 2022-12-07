<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $table = 'service_providers';
    protected $fillable = [
        'user_id',
        'service_category_id',
        // 'image',
        // 'about',
        // 'city',
        // 'service_location',
        // 'status',
    ];

    public function category()
    {
        return $this->belongsTo(SubCategory::class, 'service_category_id', 'id');
    }

    // public function users()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }
}
