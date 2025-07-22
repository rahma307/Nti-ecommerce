@props([
   
    'description'=>'',
    'sale'=>'',
    'price'=>'',
    'original'=>'',
    'img'=>'bub2',
     'product_id'=>'1',
    "class" => "card_data",
])

<div class="card">
    <img src="{{ asset('imgs/' . $img) }}" alt="clothe">

    <div class="{{ $class }}">
        <div class="text_card">
            <p>{{ $description }}</p>
        </div>

        @if ($sale)
            <p>
                <span>${{ $price }}</span>
                <span style="text-decoration: line-through; font-size: 18px; color: #696868;">
                    ${{ $original }}
                </span>
            </p>
        @else
            <p>${{ $original }}</p>
        @endif


 <form action="{{ route('cart.toggle', $product_id) }}" method="POST" class="cart-form"> 
             @csrf
            <button type="submit" onclick="count(event)" class="hidden_cart"  >
                <i class="fa-solid fa-cart-shopping"></i>
            </button>
        </form> 

<form action="{{ route('favorites.toggle', $product_id) }}" method="POST">
    @csrf
    <button type="submit" class="heart"  >
        @if(Auth::user() && Auth::user()->favorites->contains($product_id))
            <i class="fa-solid fa-heart" style="color: red;"></i>
        @else
            <i class="fa-regular fa-heart"></i>
        @endif
    </button>
</form>

    </div>
</div>
