<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content; // Pastikan Anda mengganti ini sesuai dengan model yang Anda gunakan
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    // Mendapatkan semua data contents
    public function index(Request $request)
    {
        $query = Content::with('category', 'subCategory');
    
        // Cek apakah parameter 'category_id' telah diberikan dalam request
        if (!empty($request->input('sub_category'))) {
            $subCategoryId = $request->input('sub_category');
            $query->whereHas('subCategory', function ($q) use ($subCategoryId) {
                $q->where('id', $subCategoryId);
            });
        }

        if (!empty($request->input('tag'))) {
            $tag = $request->input('tag');
            $query->where(function ($q) use ($tag) {
                $q->where('tag', $tag);
            });
        }
        $perPage = $request->input('per_page', 10); // Jumlah item per halaman (default 10)
    
        $contents = $query->paginate($perPage);
    
        return response()->json($contents);
    }


    // Mendapatkan data content berdasarkan ID
    public function show($id)
    {
        $content = Content::with('category', 'subCategory')->findOrFail($id);

        return response()->json(['data'=>$content]);
    }

    // Menyimpan data content baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'content' => 'required',
            'address' => 'required',
            'img_path' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
        ]);

        $content = Content::create($validatedData);

        return response()->json($content, 201);
    }

    // Mengupdate data content berdasarkan ID
    public function update(Request $request, $id)
    {
        $content = Content::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'content' => 'required',
            'address' => 'required',
            'img_path' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
        ]);

        $content->update($validatedData);

        return response()->json($content, 200);
    }

    // Menghapus data content berdasarkan ID
    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        $content->delete();

        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
