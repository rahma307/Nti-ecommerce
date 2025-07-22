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

        @auth
            <li><span class="welcome-msg">Hello, <strong>{{ explode(' ', auth()->user()->name)[0] }}</strong></span></li>

            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input class="btn" type="submit" style="border: none; cursor: pointer; background-color:transparent ;  color:aliceblue" value="Logout">
                </form>
            </li>
        @endauth

        @guest
            <li><a href="{{ route('login') }}" class="btn">Login</a></li>
            <li><a href="{{ route('register') }}" class="btn">Register</a></li>
        @endguest

        <li><a href="{{ route('location') }}"><i class="fas fa-map-marker-alt"></i></a></li>
        <li><a href="{{ route('home.index') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
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
    <h1>Contact Us</h1>
@endsection

@section('content2_class', 'contact-container')
@section('content2')
    <h2>Contact Us</h2>
 
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    
    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Your Name" required value="{{ old('name') }}">
        <input type="email" name="email" placeholder="Your Email" required value="{{ old('email') }}">
        <textarea name="message" placeholder="Your Message" rows="5" required>{{ old('message') }}</textarea>

        <button type="submit">Send Message</button>
    </form>
@endsection
