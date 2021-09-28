<style>
  footer .para{color: #999999;}
  footer h4{color: #eee;}
  footer ul{list-style-type:none; padding:0;}
  footer ul li a{
    color: rgb(150, 150, 150);
    text-decoration: none;
    transition: 0.2s;
    font-weight: 500;
  }
  footer ul li a:hover{
    color: white;
  }
  footer .copy{
    font-family: 'SF Pro';
  }
</style>

<?php

function footer(){
  $year = Date("Y");
  $footer = "
    <footer class='bg-dark text-light pt-5 pb-4'>
      <div class='container'>
          <div class='row'>
              <div class='col-sm-12 col-lg-4'>
                  <img src='assets/images/logo.png' alt='logo' width='200px'>
                  <p><span class='para'>
                      At the BookBae, we provide you with an excellent shopping experience, high quality books for a better lifestyle. With professionalism, the best customer service and fast shipping as our client's satisfaction matters the most. <a href='../about.php' class='text-decoration-none'>Read more...</a>
                  </span></p>
              </div>
              <div class='col-12 col-sm-6 col-lg-3 ms-auto'>
                  <h4>Quick links</h4>
                  <ul>
                      <li><a href='about.php'>About us</a></li>
                      <li><a href='contact.php'>Contact us</a></li>
                      <li><a href='privacy.php'>Privacy & Policy</a></li>
                      <li><a href='faq.php'>FAQs</a></li>
                      <li><a href='covid19-update.php'>Covid 19 update</a></li>
                  </ul>
              </div>
              <div class='col-12 col-sm-6 col-lg-3'>
                  <h4>Follow us</h4>
                  <ul>
                      <li><a href='#'>Facebook</a></li>
                      <li><a href='#'>Instagram</a></li>
                      <li><a href='#'>Twitter</a></li>
                      <li><a href='#'>Pinterest</a></li>
                  </ul>
              </div>
          </div>
      </div>
      <div class='container text-center copy'>
          <hr>
          Copyright &copy; www.bookbae.store $year
      </div>
    </footer>
  ";
  echo $footer;
}

?>