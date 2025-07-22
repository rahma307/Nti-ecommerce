     
     
    <style>
          .office p  , .main_foot p{
    font-size: 15px;
    font-weight: 100;
    margin-top: -10px;
   margin-left: -15px; }

 </style>
     <footer>
    <div class="main_foot">
        <div class="disc">
        <h2>fashion</h2>
        <p>
We offer a unique collection of high-quality clothing
designed for comfort, style, and everyday wear.  
From warm winter outfits to modern essentials,  
Thank you for choosing us .
     </p>
    </div>
    <div class="office">
         <h2>Office</h2>
       <p>
    123 Fashion Street, <br>
    Downtown, Cairo, Egypt<br>
    Phone: +20 100 123 4567<br>
    Email: support@yourstore.com<br>
    Working Hours: 10:00 AM – 8:00 PM
  </p>
    </div>
    <div class="links">
         <h2>Links</h2>
         <a href="{{ route('home.index') }}">Home</a>
         <a href="{{route('about')}}">About Us</a>
         <a href="{{route('contact')}}">Contact</a>
          <a href="{{route('location')}}">Location</a>
    </div>
    <div class="send_email">
        <h2>Newsletter</h2>
        <form action="" method="get">
            <a href=""><i class="fa-regular fa-envelope"></i></a>
            <input type="email" placeholder="Enter your email id">
            
            <hr>
             <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
        </form>
        <div class="icon_foot">
                
             <a href=""><i class="fa-brands fa-facebook-f"></i></a>
             <a href=""><i class="fa-brands fa-tiktok"></i></a>
             <a href=""><i class="fa-brands fa-twitter"></i></a> 
             <a href=""><i class="fa-brands fa-instagram"></i></a> 
            </div>
    </div>
    </div>
    <hr>
     <p class="end_footer">&copy; 2025 YourBrand. All rights reserved.</p>
 </footer>
 <script>
function toggleCart() {
  const cart = document.getElementById('cartSidebar');
  cart.classList.toggle('open');
}
</script>
</body>

</html>

