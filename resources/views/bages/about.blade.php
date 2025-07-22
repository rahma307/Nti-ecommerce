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
      
         <li><a href="{{route('location')}}"><i class="fas fa-map-marker-alt"></i></a></li>
         <li> <a href="{{route('contact')}}">Contact</a></li>
         <li> <a href="{{route('home.index')}}">Home</a></li>
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

@section('content_class', 'about-hero')
@section('content')
       <div>
            <h1>Our Story</h1>
            <p>Discover the passion and craftsmanship behind our winter collections that blend comfort with timeless elegance.</p>
        </div>
@endsection


@section('content3_class', 'about-content')
@section('content3')
       <h2 style="text-align: center; font-family: 'Courgette', cursive; margin-bottom: 2rem; color: white;">Welcome to Our Fashion World</h2>
        <p style="text-align: center; max-width: 800px; margin: 0 auto; line-height: 1.6; color: white;">
            Founded in 2015, our brand has been dedicated to creating winter fashion that doesn't compromise on style or comfort. 
            Each piece in our collection is thoughtfully designed to keep you warm while ensuring you look effortlessly chic. 
            From cozy knits to elegant outerwear, we believe winter fashion should make you feel confident and comfortable in every moment.
        </p>
        
        <div class="mission-vision">
            <div class="mission">
                <h2>Our Mission</h2>
                <p>To redefine winter fashion by creating pieces that combine functionality with sophisticated design. We aim to provide our customers with high-quality garments that stand the test of time, both in durability and style.</p>
            </div>
            <div class="vision">
                <h2>Our Vision</h2>
                <p>To become the leading brand for sustainable winter fashion, known for our commitment to quality, comfort, and timeless designs that transcend seasonal trends.</p>
            </div>
        </div>
        
        <div class="values">
            <h2 style="font-family: 'Courgette', cursive; color: white;">Our Core Values</h2>
            <div class="values-grid">
                <div class="value-item">
                    <i class="fas fa-star"></i>
                    <h3>Quality</h3>
                    <p>We source only the finest materials and pay meticulous attention to every detail in our craftsmanship.</p>
                </div>
                <div class="value-item">
                    <i class="fas fa-leaf"></i>
                    <h3>Sustainability</h3>
                    <p>We're committed to ethical production practices and minimizing our environmental impact.</p>
                </div>
                <div class="value-item">
                    <i class="fas fa-heart"></i>
                    <h3>Comfort</h3>
                    <p>Every design prioritizes your comfort without sacrificing style.</p>
                </div>
                <div class="value-item">
                    <i class="fas fa-gem"></i>
                    <h3>Elegance</h3>
                    <p>We create timeless pieces that elevate your winter wardrobe.</p>
                </div>
            </div>
        </div>
        
        <div class="winter-collection">
            <h2 style="font-family: 'Courgette', cursive; margin-bottom: 1rem;">The Winter Collection 2025</h2>
            <p style="max-width: 700px; margin: 0 auto; line-height: 1.6;">
                Our latest collection draws inspiration from the serene beauty of winter landscapes. 
                Featuring warm neutrals, rich textures, and versatile silhouettes, each piece is designed to layer seamlessly 
                and transition effortlessly from day to evening. Discover trendy winter outfits designed for comfort and elegance.
            </p>
        </div>
@endsection
 
 
 

