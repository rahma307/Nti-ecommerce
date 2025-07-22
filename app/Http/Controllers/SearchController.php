<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
   public function search(Request $request)
{
    $query = strtolower($request->input('query'));

    $results = Product::whereRaw('LOWER(description) LIKE ?', ['%' . $query . '%'])
        ->orWhereHas('category', function ($q) use ($query) {
            $q->whereRaw('LOWER(name) LIKE ?', ['%' . $query . '%']);
        })
     
        ->orWhere(function ($q) use ($query) {
            if (in_array($query, ['sale', 'خصم'])) {
                $q->where('sale', 1);
            }
        }) 
        ->orWhere(function ($q) use ($query) {
            if (in_array($query, ['new', 'new arrival', 'جديد'])) {
                $q->where('new_arrival', 1);
            }
        })
        ->get();

    if ($results->isEmpty()) {
        return redirect()->back()->with('message', 'No results found for your search.');
    } else {
        return view('bages.search', compact('results'));
    }
}


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product-details', compact('product'));
    }
}
