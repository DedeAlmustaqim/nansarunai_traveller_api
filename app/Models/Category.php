<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'img_path',
        // Tambahkan kolom-kolom lain sesuai kebutuhan Anda
    ];

    // Definisikan relasi jika diperlukan, misalnya dengan tabel "contents" atau "sub_categories"
    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
