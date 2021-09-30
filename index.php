<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>
<?php include "components/book.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookBae | Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></link>
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
</head>
<body>

<div class="landing">
    <!-- Navbar starts -->
    <?php navbar("home"); ?>
    <!-- Navbar ends -->

    <section class="position-relative mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-grid align-content-center order-2 order-md-1">
                    <div class="mx-auto mx-md-0 text-center text-md-start">
                        <h1 class="animate__animated animate__slideInDown">Reading is dreaming with open eyes!</h1>
                        <p class="text-secondary animate__animated animate__slideInLeft">Explore your favorite books for an affordable price and feel your dream world.</p>
                        <a href="search.php?q=" class="btn px-3 shop-now-btn animate__animated animate__slideInLeft">
                            <strong>Shop now</strong> <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                
                </div>
                <div class="col-md-6 d-flex justify-content-center order-1">
                    <img src="assets/images/reading.png" alt="" width="80%">
                </div>
            </div>
        </div>
        <div class="round-1 d-none d-md-block"></div>
    </section>

    <section class="position-relative my-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card card-1">
                        <div class="card-icon"><i class="bi bi-truck"></i></div>
                        <h4>Islandwide delivery</h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card card-2">
                        <div class="card-icon"><i class="bi bi-book"></i></div>
                        <h4>150,000+ books</h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card card-3">
                        <div class="card-icon"><i class="bi bi-wallet"></i></div>
                        <h4>100% secure payments</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid my-5">
        <h3 class="mb-1">Featured products</h3>
        <div class="mb-4 hr"></div>
        <div class="row">
            <?php book("9789556654288",3); ?>
            <?php book("1406340170",3); ?>
            <?php book("034914043",3); ?>
            <?php book("64537384647",3); ?>
           
        </div>
    </section>

    <section class="container-fluid my-5">
        <h3 class="mb-1">New arrivals</h3>
        <div class="mb-4 hr"></div>
        <div class="row">
            <?php book("12321354565856",2); ?>
            <?php book("987456123654",2); ?>
            <?php book("12321354598856",2); ?>
            <?php book("456987456321",2); ?>
            <?php book("987456123654",2); ?>
            <?php book("556987456321",2); ?>
        </div>
    </section>

    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <img src="assets/svg/subscribe.svg" alt="" style="width: 70%;">
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="col-11 col-md-10 col-lg-8">
                        <h1 class="mb-0">Subscribe us</h1>
                        <div class="hr mb-3"></div>
                        <p class="text-secondary">Hello, Sign up it only takes a second to be thefirst to find out about our latest books and promotions.</p>
                        <form action="php/subscribe.php" method="post">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="username@example.com" name="email" required>
                                <button class="btn btn-outline text-white bg-brown" type="submit"><strong>Subscribe</strong></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer starts -->
    <?php footer(); ?>
    <!-- Footer ends -->
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>