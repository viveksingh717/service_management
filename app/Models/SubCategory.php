<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';
    protected $fillable = [
        'parentCategory_id',
        'subCategory_name',
        'subCategory_slug',
        'subCategory_image',
        'subCategory_desc',
    ];

    public function category()
    {
       return $this->belongsTo(Category::class, 'parentCategory_id', 'id');
    }

    // public function service()
    // {
    //    return $this->hasMany(Service::class, 'category_id', 'id');
    // }
}
