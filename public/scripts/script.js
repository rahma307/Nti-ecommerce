const swiper = new Swiper('.swiper', {
  
  loop:  true ,
  slidesPerView: 1,
  spaceBetween: 20,
  
   effect: 'coverflow',
 grabCursor: true,
  centeredSlides: true,
  slidesPerView: 'auto',

  coverflowEffect: {
    rotate: 50,       
    stretch: 0,     
    depth: 100,       
    modifier: 1,      
    slideShadows: true, 
  }
,
//   If we need pagination
  pagination: {
    el: '.swiper-pagination',
     clickable: true,
  },
  

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

 
});
 
let check=0;
// let arr=[0,1,2,3,4,5,6,7];
// let i=0; 
// let j=0;
 function showName() {
   
    const name = document.getElementById("username").value;
    document.getElementById("result").textContent = "Hello, " + name + "!";
  }
// function heart(){
 const her = document.querySelector(".heart");
 her.addEventListener('click', ()=>{
 her.classList.toggle("active")
    console.log(her);
 })
 
 let cart = document.querySelector("#cart_nav");
 cart.addEventListener('click', () => {
   const cartSidebar = document.getElementById("cartSidebar");
   cartSidebar.classList.toggle("active");
 });

 const cartItems = document.getElementById('cartItems');
function toggleCart() {
  const cartSidebar = document.getElementById("cartSidebar");
  cartSidebar.classList.toggle("active");
}


   const cart_items = {};

function count(event) {
  const card = event.target.closest('.card');
  const img = card.querySelector('img').src;
  const text = card.querySelector('.text_card p').textContent.trim();
  const price = card.querySelector('.card_data > p').textContent.trim();

  const key = text;  

  if (cart[key]) { 
    cart[key].count++;
    document.querySelector(`#item-${cart[key].id} .item-count`).textContent = `x${cart[key].count}`;
  } else {
     
    const itemId = Object.keys(cart).length + 1;
    cart[key] = {
      id: itemId,
      img,
      text,
      price,
      count: 1
    };

    const li = document.createElement('li');
    li.id = `item-${itemId}`;
    li.innerHTML = `
      <img src="${img}" width="50" style="margin-right:10px">
      <span>${text.substring(0, 20)}...</span> - <strong>${price}</strong>
      <span class="item-count">x1</span>
    `;
    document.getElementById('cartItems').appendChild(li);
  }
}   

 
    document.querySelectorAll('.cart-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); 

            const actionUrl = form.action;
            const formData = new FormData(form);
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(actionUrl, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    console.log('done');
                    
                } else {
                    console.error('Error');
                }
            })
            .catch(error => {
                console.error('conection error', error);
            });
        });
    });
 
document.querySelectorAll('.cart-action-form').forEach(function(form) {
    form.addEventListener('submit', function(e) {
        e.preventDefault();  

        const actionUrl = form.action;
        const formData = new FormData(form);
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(actionUrl, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            body: formData
        })
        .then(response => {
            if (response.ok) {
                  
                location.reload();  
            } else {
                console.error('error');
            }
        })
        .catch(error => {
            console.error('error', error);
        });
    });
});