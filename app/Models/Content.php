<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'contents';

    protected $fillable = [
        'name',
        'content',
        'category_id',
        'address',
        'sub_category_id',
        'img_path',
        'latitude',
        'longitude',
    ];

    // Definisikan relasi jika diperlukan, misalnya dengan tabel "categories" dan "sub_categories"
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public static function getContentWithCategoryAndSubCategory()
    {
        return self::select('contents.name', 'categories.name as category_name', 'sub_categories.name as sub_category_name')
            ->join('categories', 'contents.category_id', '=', 'categories.id')
            ->join('sub_categories', 'contents.sub_category_id', '=', 'sub_categories.id')
            ->get();
    }

    
}
