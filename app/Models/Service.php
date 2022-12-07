<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = [
        'category_id ',
        'service_name ',
        'service_slug  ',
        'tagline ',
        'description ',
        'price ',
        'discount ',
        'discount_type ',
        'service_image ',
        'thumbnail ',
        'inclusion ',
        'exclusion ',
        'status ',
    ];

    public function sub_category()
    {
       return $this->belongsTo(SubCategory::class, 'category_id', 'id');
    }
}
