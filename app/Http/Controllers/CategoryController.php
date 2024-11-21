<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string',
        ]);

        $category = Category::create([
            'name_ar' => $validated['name_ar'],
        ]);

        return response()->json(['message' => 'Category created successfully', 'category' => $category]);
    }
}
