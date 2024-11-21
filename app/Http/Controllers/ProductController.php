<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
  
    public function index()
{
    return Product::with('category')->get();
}

    public function store(Request $request)
{
    $validated = $request->validate([
        'name_ar' => 'required|string',
        'description_ar' => 'required|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'required|image'
    ]);

    $path = $request->file('image')->store('products');

    Product::create(array_merge($validated, ['image' => $path]));

    return response()->json(['message' => 'Product created successfully']);
}

    public function show($id)
{
    
    $product = Product::findOrFail($id);
    
  
    return view('product.show', compact('product'));
}


}
