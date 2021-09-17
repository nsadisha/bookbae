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
    <title>BookBae | Register</title>
</head>
<body>

    <!-- Navbar starts -->
    <?php navbar(""); ?>
    <!-- Navbar ends -->

    <!-- Page content starts -->
    <div class="container">
        
        <div class="swiper myswiper">
            <div class="swiper-wrapper" style="height: fit-content;">
                <div class="card swiper-slide" style="width: 18rem;">
                    <img src="assets/images/view page/1.jpg" class="card-img-top" alt="...">
                </div>
                <div class="card swiper-slide" style="width: 18rem;">
                    <img src="assets/images/view page/1.jpg" class="card-img-top" alt="...">
                </div>
                <div class="card swiper-slide" style="width: 18rem;">
                    <img src="assets/images/view page/1.jpg" class="card-img-top" alt="...">
                </div>
                <div class="card swiper-slide" style="width: 18rem;">
                    <img src="assets/images/view page/1.jpg" class="card-img-top" alt="...">
                </div>
            </div><br>
            <div class="swiper-pagination"></div>
        </div>
        <h1 class="text-center">Rotten school and great smelling bee</h1>
        <div class="container description">
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
                <div class="col-12">
                    <p>Rotten School is a children's book series by R. L. Stine 
                        concerning the adventures of children at a boarding school.
                        Each book is written from the perspective of Bernie Bridges,
                        a fourth-grader who lives in his dormitory at Rotten School 
                        with his pals Belzer, Feenman and Crench, Beast, Chipmunk, 
                        Nosebleed, Billy The Brain and others. Their rivals are Sherman
                        Oaks, a rich spoiled brat, and his buddies Wes Updood and Joe
                        Sweety, from the Nyce House dormitory. 
                    </p>
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
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                </div>
                <div class="col-4">
                    <button class="btn btn-primary" type="submit">Buy now</button>
                </div>
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