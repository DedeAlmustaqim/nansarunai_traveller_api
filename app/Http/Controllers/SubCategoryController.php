<?php

// app/Http/Controllers/SubCategoryController.php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;


class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $category_id = $request->input('category_id');
        $subCategories = SubCategory::where('category_id', $category_id)->get();
        return response()->json(['data' => $subCategories]);
    }

    public function show($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        return response()->json($subCategory);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subCategory = SubCategory::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
        ]);

        return response()->json($subCategory, 201);
    }

    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',

        ]);

        $subCategory->update([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
        ]);

        return response()->json($subCategory);
    }

    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();

        return response()->json(['message' => 'Subcategory deleted']);
    }
}
