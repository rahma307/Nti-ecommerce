<?php

namespace App\Http\Controllers;

use   Illuminate\Http\Request;   
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class Homecontroller extends Controller
{
    //
    public function index()

    {  
        if (!Session::has('random_products')) {
            $products = Product::inRandomOrder()->take(18)->get();
            Session::put('random_products', $products);
        } else {
            $products = Session::get('random_products');
        }

        return view('bages.index', compact('products'));
    }

    //  public function collection()

    // {  
    //     $products = Product::all();
    // return view('bages.collection', compact('products'));
        
    // }


}

 