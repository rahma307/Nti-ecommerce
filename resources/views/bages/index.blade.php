@extends('layouts.main_layout')

 
@section('nav')
    <ul>   
        <li><form action="{{ route('search') }}" method="GET" style="display: inline;">
         <input type="text" name="query" placeholder="Search..." value="{{ request('query') }}">
        <button type="submit" onclick="showName()" ><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
          @if(session('message'))
    <p style="color: white;">{{ session('message') }}</p>
          @endif
          </li>
            @auth
                 
                 <li>   <span class="welcome-msg">Hello, <strong>{{ explode(' ', auth()->user()->name)[0] }}</strong></span></li> 
                   
                  <li> <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input class="btn" type="submit" style="border: none; cursor: pointer; background-color:transparent ;  color:aliceblue" value="Logout">
                    </form>
                </li>  
            @endauth

            @guest
                
                  <li>   <a href="{{ route('login') }}" class="btn">Login</a></li>
                  <li>  <a href="{{ route('register') }}" class="btn">Register</a></li> 
                
            @endguest
         <!-- <li><a href="{{route('login')}}">Login</a></li> -->
         <li><a href="{{route('location')}}"><i class="fas fa-map-marker-alt"></i></a></li>
         <li> <a href="{{route('contact')}}">Contact</a></li>
         <li> <a href="{{route('about')}}">About</a></li>
         <li>
    <a href="{{ route('favorites.index') }}" class="favorite-icon-btn">
        <i class="fa-solid fa-heart" style="color: red;"></i>
    </a>
</li>
         <li style="color: white; "> <button id="cart_nav"  onclick="toggleCart()" class="cart-icon-btn" style="color: white; display:block;">  <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <path d="M6 6h15l-1.5 9h-13z" />
    <circle cx="9" cy="20" r="1.5" />
    <circle cx="18" cy="20" r="1.5" />
    <path d="M6 6L4 2H1" />
  </svg> </button></li>
    </ul>
  
  
<div id="cartSidebar" class="cart-sidebar">
  <div class="cart-header">
    <h3 style="color: white;">Cart</h3>
    <button onclick="toggleCart()" class="close-btn" style="color: white;">×</button>
  </div>

  <div class="cart-content">
    @auth
        @php $cartProducts = Auth::user()->products; @endphp
@forelse ($cartProducts->take(4) as $product)
    <div class="box_cart">
        <div class="cart-item">
            <x-card 
                :description="$product->description"
                :sale="$product->sale"
                :price="$product->price"
                :original="$product->original_price"
                :product_id="$product->id"
                :img="$product->image"
                :class="'card_data_cart'"
            />
            
     <div class="button_cart">
    <form action="{{ route('cart.toggle', $product->id) }}" method="POST">
        @csrf
        <input type="number" min="1" name="decrease" value="{{ $product->pivot->quantity }}" class="number" />
        <input type="submit" value="Update" class="sub">
    </form>
    <form action="{{ route('cart.remove', $product->id) }}" method="POST">
        @method('Delete')
        @csrf
        <input type="hidden" name="decrease" value="1">
        <button class="remove">Remove</button>
    </form>
          </div>
        </div> <!-- cart-item -->
    </div> <!-- box_cart -->
@empty
    <p>cart is empty</p>
@endforelse

    @endauth
 
  <div class="cart_show" >
    <a href="{{ route('cart.index') }}"  >Show All</a>
</div>
 


@endsection


@section('content_class', 'text')
@section('content')
      <h1>Winter Collection 2025 </h1>
       <p>Discover trendy winter outfits designed  <br>for comfort and elegance.</p>
@endsection

@section('content2_class', 'button_1')
@section('content2')
    <a href="#sec_1"><i class="fas fa-chevron-down"></i></a>
@endsection

  
@section('content3_class', 'section_1')
@section('content3')
    <div class="cont"> 

         <div class="nav_bar">
            
             <div class="nav_icons">
                <ul>
                    <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href=""></a><i class="fa-brands fa-tiktok"></i></li>
                    <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                </ul>
             </div>
               <div class="nav_text">
                <ul>
                <li><a href="{{route('products.index')}}" >Collection</a></li>
                <li><a href="{{route('sales.page')}}">Salles</a></li>
                <li><a href="{{route('new.arrivals')}}">New Arrivel</a></li>
            </ul>
             </div>
        </div>
      <div class="cards">
@foreach($products->slice(0, 9) as $product)
    <x-card  
        :description="$product->description"
        :sale="$product->sale"
        :price="$product->price"
        :original="$product->original_price"
        :product_id="$product->id"
        :img="$product->image"
    />
@endforeach

</div>

  
 @endsection
 