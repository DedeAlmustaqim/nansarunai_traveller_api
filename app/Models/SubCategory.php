<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';

    

    // Definisikan relasi jika diperlukan, misalnya dengan tabel "contents" atau "categories"
    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
