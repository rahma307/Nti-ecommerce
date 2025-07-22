<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categoryName = $request->query('category'); 

        if ($categoryName && $categoryName !== 'All') {
            $category = Category::where('name', $categoryName)->first();
            $products = $category
                ? Product::where('category_id', $category->id)->get()
                :  Product::all();  
        } else {
            $products = Product::all(); 
        }

        $categories = Category::all();

        return view('bages.collection', compact('products', 'categories'));
    }

 public function sales(Request $request)
{
    $query = Product::query();

    
    $query->where('sale', true);

     
    if ($request->has('category') && $request->category != 'All') {
        $category = Category::where('name', $request->category)->first();
        if ($category) {
            $query->where('category_id', $category->id);
        }
    }

    $products = $query->get();
    $categories = Category::all();

    return view('bages.salles', compact('products', 'categories'));
}

public function newArrivals(Request $request)
{
    $query = Product::where('new_arrival', true);

    if ($request->has('category') && $request->category != 'All') {
        $category = Category::where('name', $request->category)->first();
        if ($category) {
            $query->where('category_id', $category->id);
        }
    }

    $products = $query->get();
    $categories = Category::all();

    return view('bages.newarrivel', compact('products', 'categories'));
}



}
