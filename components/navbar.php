<style>
    /* Navbar */
    .navbar .navbar-nav .nav-item .nav-link{
        color: #87574b;
        font-weight: 500;
    }
    .navbar .navbar-nav .nav-item .active span{
        color: white;
        background-color: #87574b;
        padding-left: 0.7rem;
        padding-right: 0.7rem;
        border-radius: 20px;
    }
    /* Navbar */
</style>
<?php

function isActive($current, $page){
    return $current==$page?" active":"";
}

function navbar($nav){

    $navbar = "
    <nav class='navbar navbar-expand-md navbar-light bg-none'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='#'><img src='assets/images/logo.png' alt='logo' width='120'></a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
                <li class='nav-item'><a class='nav-link".isActive($nav, "home")."' href='index.php'>
                    <span>Home</span>
                </a></li>
                <li class='nav-item'><a class='nav-link".isActive($nav, "about")."' href='about.php'>
                    <span>About us</span>
                </a></li>
                <li class='nav-item'><a class='nav-link".isActive($nav, "contact")."' href='contact.php'>
                    <span>Contact us</span>
                </a></li>
                <li class='nav-item'><a class='nav-link".isActive($nav, "signin")."' href='signin.php'>
                    <span>Sign in</span>
                </a></li>
                <li class='nav-item'><a class='nav-link".isActive($nav, "register")."' href='register.php'>
                    <span>Register</span>
                </a></li>
                <li class='nav-item'><a class='nav-link".isActive($nav, "account")."' href='account.php'>
                    <span>Account</span>
                </a></li>
            </ul>
            </div>
        </div>
    </nav>
    ";
    echo $navbar;
}

?>