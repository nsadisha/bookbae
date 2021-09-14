<style>
  footer ul{list-style-type:none; padding:0;}
  footer ul li a{
    color: rgb(150, 150, 150);
    text-decoration: none;
    transition: 0.2s;
  }
  footer ul li a:hover{
    color: white;
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
                  <!-- <h2>BookBae</h2> -->
                  <img src='assets/images/logo.png' alt='logo' width='200px'>
                  <p><small>
                      Sarasavi.lk is a website for an extensive collection of books, stationery and magazines.Not only a “one-stop shop” for book lovers but also an interactive and innovative destination designed to make it fun and exciting to discover and shop for new books and gifts online.book lovers but also an interactive and innovative destination designed to make it fun and exciting to discover and shop for new books and gifts online.
                  </small></p>
              </div>
              <div class='col-12 col-sm-6 col-lg-3 ms-auto'>
                  <h4>Quick links</h4>
                  <ul>
                      <li><a href='#'><strong>About us</strong></a></li>
                      <li><a href='#'><strong>Contact us</strong></a></li>
                      <li><a href='#'><strong>Privacy & Policy</strong></a></li>
                      <li><a href='#'><strong>Terms & Conditions</strong></a></li>
                  </ul>
              </div>
              <div class='col-12 col-sm-6 col-lg-3'>
                  <h4>Follow us</h4>
                  <ul>
                      <li><a href='#'><strong>Facebook</strong></a></li>
                      <li><a href='#'><strong>Instagram</strong></a></li>
                      <li><a href='#'><strong>Twitter</strong></a></li>
                      <li><a href='#'><strong>Pinterest</strong></a></li>
                  </ul>
              </div>
          </div>
      </div>
      <div class='container text-center'>
          <hr>
          Copyright &copy; www.bookbae.com $year
      </div>
    </footer>
  ";
  echo $footer;
}

?>