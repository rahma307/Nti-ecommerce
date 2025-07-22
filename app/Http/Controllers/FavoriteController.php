<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class FavoriteController extends Controller
{
    //
    public function index()
{$user = Auth::user();
  $favorites = Auth::user()->favorites;
    return view('bages.favorite', compact('favorites'));
}

    public function toggle(Product $product)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in.');
    }

    if ($user->favorites()->where('product_id', $product->id)->exists()) {
        $user->favorites()->detach($product->id);
    } else {
        $user->favorites()->attach($product->id);
    }

    return back();
}

 
}
