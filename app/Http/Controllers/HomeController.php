<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        $categories = Category::all();
        $products = Product::all();

       
        return view('welcome', compact('categories', 'products'));
    }
}
