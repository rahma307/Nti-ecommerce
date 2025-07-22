document.addEventListener("DOMContentLoaded", function () {
  const black = document.querySelector('.black_back');
  const img = document.querySelector('.img');
  let check = 0;

  function attachEvent(button) {
    if (!button || !black || !img) {
      console.error("error");
      return;
    }

    button.addEventListener('click', () => {
      console.log('clicked');
      if (check == 0) {
        // Remove old classes
        black.classList.remove('active2');
        button.classList.remove('done2');
        img.classList.remove('move2');

        // Force reflow
        void black.offsetWidth;
        void button.offsetWidth;
        void img.offsetWidth;

        // Update content
        button.textContent = 'Sign in';
        black.innerHTML = `
          <h1>Sign in</h1>
          <button class="Logi Login">LOGin</button>
           <p class="p1">Please sign in to your account to continue shopping your favorite styles.</p>
            <form action="">
                <input type="email" placeholder="EMAIL">
                <input type="password" placeholder="password">
                <input type="password" placeholder="confirm password">
                <input type="submit" value="Sign in" class="submit">
            </form>
            <p class="or">OR</p>
             <div class="icon">
                <button><i class="fa-brands fa-twitter"></i></button>
                <button><i class="fa-brands fa-facebook-f"></i></button>
                 <button><i class="fa-brands fa-google"></i></button>
             </div>
        </div>
        `;
 
        const newButton = document.querySelector('.Login');
        attachEvent(newButton);

        // Add classes
        black.classList.add('active');
        newButton.classList.add('done');
        img.classList.add('move');

        check = 1;
      } else {
     
        black.classList.remove('active');
        button.classList.remove('done');
        img.classList.remove('move');

        button.textContent = 'LOGin';

        //  button.textContent = 'Sign in';
        black.innerHTML = `
            <h1>LOG in</h1>
          <button class="Logi Login">Sign in</button>
          <p class="p1">Please sign in to your account to continue shopping your favorite styles.</p>
          <form action="">
              <input type="email" placeholder="EMAIL">
              <input type="password" placeholder="password">
              <input type="submit" value="Login" class="submit">
          </form>
          <div class="forget">
            <div class="check">
              <input type="checkbox" name="remember" class="rem"> 
              <p> Remember Me</p>
            </div>
            <a href="">Forget Your Password?</a>
          </div>
          <p class="or">OR</p>
          <div class="icon">
              <button><i class="fa-brands fa-twitter"></i></button>
              <button><i class="fa-brands fa-facebook-f"></i></button>
              <button><i class="fa-brands fa-google"></i></button>
          </div>
        `;
        const newButton = document.querySelector('.Login');
        attachEvent(newButton);
        void black.offsetWidth;
        void button.offsetWidth;
        void img.offsetWidth;

        black.classList.add('active2');
        button.classList.add('done2');
        img.classList.add('move2');

        check = 0;
      }
    });
  }

  
  const initialBtn = document.querySelector('.Login');
  attachEvent(initialBtn);
});
