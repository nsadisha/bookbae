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
                      Sarasavi.lk is a website for an extensive collection of books, stationery and magazines.Not only a “one-stop shop” for book lovers but also an interactive and innovative destination designed to make it fun and exciting to discover and shop for new books and gifts online.book lovers but also an interactive and innovative destination designed to make it fun and exciting to discover and shop for new books and gifts online.
                  </span></p>
              </div>
              <div class='col-12 col-sm-6 col-lg-3 ms-auto'>
                  <h4>Quick links</h4>
                  <ul>
                      <li><a href='#'>About us</a></li>
                      <li><a href='#'>Contact us</a></li>
                      <li><a href='#'>Privacy & Policy</a></li>
                      <li><a href='#'>Terms & Conditions</a></li>
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
          Copyright &copy; www.bookbae.com $year
      </div>
    </footer>
  ";
  echo $footer;
}

?>