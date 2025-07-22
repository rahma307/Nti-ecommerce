 @include('includes.head')
<link rel="stylesheet" href="{{ asset('styles/form.css') }}">
 
</head>
<body>
  
    <div class="form_bod">
        <div class="img"></div>
        
        <div class="black_back">
              <!-- <button class="Login" >Sign in</button> -->
             <h1>LOG in</h1>
         
          <p class="p1">Please sign in to your account to continue shopping your favorite styles.</p>
          <form action="{{route('auth.login') }}" method="POST">
            @csrf
              <input type="email" placeholder="EMAIL" name="email" >

              <input type="password" placeholder="password" name="password" >
              <input type="submit" value="Login" class="submit">
               <button><a href="{{ route('register') }}">Register</a></button>
          </form >

          <div class="forget">
            
          <p class="or">OR</p>
          <div class="icon">
              <button><i class="fa-brands fa-twitter"></i></button>
              <button><i class="fa-brands fa-facebook-f"></i></button>
              <button><i class="fa-brands fa-google"></i></button>
          </div>
         
    </div>
  <!-- <script src=" {{asset('scripts/script2.js')}}"></script> -->
</body>
</html>
  
 

 
