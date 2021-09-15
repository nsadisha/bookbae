<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>
<?php include "components/book.php" ?>
<?php include "components/filter.php" ?>

<?php
    $isSearched = false;
    $q = "";
    $search = "";


    if(isset($_REQUEST["q"])){
        $isSearched = true;
        $q = $_REQUEST["q"];
        $search = str_replace(" ", "+", $q);
    }


    //add to fav
    if(isset($_REQUEST["fav"])){
        if(!isSigned()){
            addToFav($_REQUEST["fav"]);
        }else{
            header("Location: signin.php");
        }
    }
    //add to cart
    if(isset($_REQUEST["cart"])){
        if(!isSigned()){
            addToCart($_REQUEST["cart"]);
        }else{
            header("Location: signin.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
    <title>BookBae | Home</title>
</head>
<body>

    <!-- Navbar starts -->
    <?php navbar('home'); ?>
    <!-- Navbar ends -->

    <!-- Page content starts -->

    <!-- search bar -->
    <section class="mt-2 <?php echo !$isSearched?"d-block":"d-none" ?>">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="get" class="col-5 col-md-4">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="q">
                        <button class="btn btn-outline-secondary" type="submit">search</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- landing -->
    <section class="<?php echo !$isSearched?"d-block":"d-none" ?>">
        <div class="container-fluid">
            <h4>New arrivals</h4>
        </div>
    </section>

    <!-- search products -->
    <section class=" mt-2 <?php echo $isSearched?"d-block":"d-none" ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 px-4 d-none d-md-block">
                <div class="position-sticky top-0  py-4">
                    <?php showFilter(); ?>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="get" class="col-md-7 m-0">
                        <div class="input-group">
                            <input type="text" class="form-control m-0" placeholder="Search" name="q" value="<?php echo $q; ?>">
                            <button class="btn btn-outline-secondary" type="submit">search</button>
                        </div>
                    </form>
                </div>
                <p class="mb-3">Showing 25 results</p>
                <div class="row g-2">
                    <?php book("12321354565856"); ?>
                    <?php book("12321354598856"); ?>
                </div>
            
                <div class="row justify-content-center mt-3">
                    <div class="col-auto">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Page content ends -->

    <!-- Footer starts -->
    <?php footer(); ?>
    <!-- Footer ends -->
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>