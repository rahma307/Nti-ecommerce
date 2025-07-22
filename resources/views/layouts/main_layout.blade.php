@include('includes.head')
  
</head>
<body>
 <div class="home1"> 
<header>
    <div class="nav">
        @yield('nav')
    </div>
</header>

<div class="@yield('content_class','default-class')">
    @yield('content')
</div>
<h1> @yield('header')</h1>

<div class="@yield('content2_class')">
    @yield('content2')
</div>
</div>

<div class="@yield('content3_class')" id="sec_1">
    @yield('content3')
</div>
<div class="@yield('content4_class')"  >
    @yield('content4')
</div>
 
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('scripts/script.js') }}"> </script>
@include('includes.footer')