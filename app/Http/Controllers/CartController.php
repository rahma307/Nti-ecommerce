<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{public function toggle(Request $request, Product $product)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in.');
    }

    $existing = $user->products()->where('products.id', $product->id)->first();

    if ($existing) {
        $pivot = $existing->pivot;

        if ($request->has('decrease')) {
            if ($pivot->quantity > 1) {
                  $user->products()->updateExistingPivot($product->id, ['quantity' => $request->decrease]);
            } else {
                $user->products()->detach($product->id);
            }
        } else {
            $user->products()->updateExistingPivot($product->id, ['quantity' => $pivot->quantity + 1]);
        }
    } else {
        $user->products()->attach($product->id, ['quantity' => 1]);
    }

    return back()->with('success', 'Cart updated.');
}


    public function showCart()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in.');
        }

      $products = $user->products()->with('category')->get();

        return view('bages.cart', compact('products'));
    }

    public function increase(Product $product)
{$user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in.');
    }

    $existing = $user->products()->where('products.id', $product->id)->first();

    if ($existing) {
        $pivot = $existing->pivot;
        $user->products()->updateExistingPivot($product->id, ['quantity' => $pivot->quantity + 1]);
    }

    return back();
}

public function remove(Product $product)
{
     $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in.');
    }

    $user->products()->detach($product->id);

    return back();
}
}

 
