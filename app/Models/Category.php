<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'category_name',
        'category_slug',
        'category_image',
        'status',
    ];

    // public function sub_category()
    // {
    //    return $this->hasMany(SubCategory::class, 'parentCategory_id', 'id');
    // }
}
