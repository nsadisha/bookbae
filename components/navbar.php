<style>
    /* Navbar */
    .navbar .navbar-nav .nav-item .nav-link{
        color: #87574b;
    }
    .navbar .navbar-nav .nav-item .active strong{
        color: white;
        background-color: #87574b;
        padding-left: 0.7rem;
        padding-right: 0.7rem;
        border-radius: 20px;
    }
    /* Navbar */
</style>
<?php

function navbar(){
    $navbar = "
    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='#'><img src='assets/images/logo.png' alt='logo' width='120'></a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
                <li class='nav-item'><a class='nav-link active' href='#'><strong>Home</strong></a></li>
                <li class='nav-item'><a class='nav-link' href='#'><strong>About us</strong></a></li>
                <li class='nav-item'><a class='nav-link' href='#'><strong>Contact us</strong></a></li>
                <li class='nav-item'><a class='nav-link' href='#'><strong>Login</strong></a></li>
                <li class='nav-item'><a class='nav-link' href='#'><strong>Register</strong></a></li>
                <li class='nav-item'><a class='nav-link' href='#'><strong>Account</strong></a></li>
            </ul>
            </div>
        </div>
    </nav>
    ";
    echo $navbar;
}

?>