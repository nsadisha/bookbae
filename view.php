<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/view.css">

    <!-- bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- swiper css -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto+Slab&display=swap" rel="stylesheet">
    
    <title>BookBae | Register</title>
</head>
<body>

    <!-- Navbar starts -->
    <?php navbar(""); ?>
    <!-- Navbar ends -->

    <!-- Page content starts -->
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-6 justify-content-end">
                <div class="row">
                    <div class="col-6 d-flex justify-content-end">
                        <div class="card " style="width: 12rem;">
                            <img src="assets/images/view page/1.jpg" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card " style="width: 12rem;">
                            <img src="assets/images/view page/1.jpg" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page description-->
        <div class="container description mx-auto">
            <div class="row ">
                <div class="col-6">
                    ISBN
                </div>
                <div class="col-6">
                    1235
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    Author
                </div>
                <div class="col-6">
                    R.L Stine
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 ">
                    Language
                </div>
                <div class="col-6">
                    English
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 ">
                    Year
                </div>
                <div class="col-6">
                    2014
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 ">
                    Edition
                </div>
                <div class="col-6">
                    six
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 ">
                    Publisher
                </div>
                <div class="col-6">
                    1235
                </div>
            </div>

            <div class="row">
                <div class="col-6 ">
                    Description
                </div>
                
            </div>
            <div class="row justify-content-center">
                <div class="col-12 ">
                    Price
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4 ">
                    <h3>$25.34</h3>
                </div>
                <div class="col-4">
                    <button class="btn btn-primary" type="submit"><i class="bi bi-cart3"></i>Add to cart</button>
                </div>
                <div class="col-4">
                    <button class="btn btn-primary" type="submit"><i class="bi bi-coin"></i>Buy now</button>
                </div>
            </div>    

            </div>
        </div>

        <!--related items -->
        <div class="container related-items">
            <h3 class="m-3">Related Items</h3>
            <div class="block row">
                <div class="col-sm-3 ">
                    <div class="card" >
                        <img src="assets/images/view page/1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title m-0">The school is haunted</h6>
                            <p class="card-text m-0">Price $30.32</p>
                            <a href="#" class="btn btn-primary p-1 m-1 bg-brown"><i class="bi bi-cart3"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card" >
                        <img src="assets/images/view page/1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title m-0">The school is haunted</h6>
                            <p class="card-text m-0">Price $30.32</p>
                            <a href="#" class="btn btn-primary p-1 m-1"><i class="bi bi-cart3"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card" >
                        <img src="assets/images/view page/1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title m-0">The school is haunted</h6>
                            <p class="card-text m-0">Price $30.32</p>
                            <a href="#" class="btn btn-primary p-1 m-1"><i class="bi bi-cart3"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card" >
                        <img src="assets/images/view page/1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title m-0">The school is haunted</h6>
                            <p class="card-text m-0">Price $30.32</p>
                            <a href="#" class="btn btn-primary p-1 m-1"><i class="bi bi-cart3"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container gif mx-auto p-5  m-3">
            <div class="row align-items-center">
                <div class="col-md-6 ">
                    <img src="assets/images/view page/gif.gif" class="card-img-top" alt="...">
                </div>
                <div class="col-md-6 p-4 ">
                    <p>"Books are the quietest and most constant of friends; they are the most accessible and wisest of counselors, and the most patient of teachers."</p>
                    <p>-Charles W. Eliot</p>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Page content ends -->

    <!-- Footer starts -->
        <?php footer(); ?>
    <!-- Footer ends -->


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="js/view.js"></script>
</html>