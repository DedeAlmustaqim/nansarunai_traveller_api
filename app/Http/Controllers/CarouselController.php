<?php

namespace App\Http\Controllers;

use App\Models\Carousels;
use Illuminate\Http\Request;


class CarouselController extends Controller
{
    // Menampilkan semua kategori
    public function index(Request $request)
    {

        $perPage = $request->input('per_page', 10); // Menentukan jumlah item per halaman, default 10 jika tidak ada yang diberikan
        $sortBy = $request->input('sort_by', 'created_at'); // Menentukan kolom pengurutan, default 'created_at' jika tidak ada yang diberikan
        $sortOrder = $request->input('sort_order', 'desc'); // Menentukan urutan pengurutan, default 'desc' (descending) jika tidak ada yang diberikan
       
        $query = Carousels::orderBy($sortBy, $sortOrder);

        // Menggunakan paginate() berdasarkan hasil kueri dan jumlah item per halaman
        // $items = $query->paginate($perPage);

        $data = $query->paginate($perPage);
        return response()->json($data);
    }

    // Menampilkan detail kategori berdasarkan ID
    public function show($id)
    {
        $data = Carousels::findOrFail($id);
        return response()->json($data);
    }

    // Membuat kategori baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img_path' => 'required',
        ]);

        $data = Carousels::create($validatedData);

        return response()->json($data, 201);
    }

    // Mengupdate kategori berdasarkan ID
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img_path' => 'required',
        ]);

        $data = Carousels::findOrFail($id);
        $data->update($validatedData);

        return response()->json($data, 200);
    }

    // Menghapus kategori berdasarkan ID
    public function destroy($id)
    {
        $data = Carousels::findOrFail($id);
        $data->delete();

        return response()->json(null, 204);
    }
}
