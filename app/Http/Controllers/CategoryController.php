<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $categories = Category::paginate();
        return response()->json($categories);
    }

    // Menampilkan detail kategori berdasarkan ID
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    // Membuat kategori baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = Category::create($validatedData);

        return response()->json($category, 201);
    }

    // Mengupdate kategori berdasarkan ID
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validatedData);

        return response()->json($category, 200);
    }

    // Menghapus kategori berdasarkan ID
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(null, 204);
    }
}
