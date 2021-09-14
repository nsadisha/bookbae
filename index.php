<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>
<?php include "components/filter.php" ?>

<?php
    $isSearched = false;
    if(isset($_REQUEST["search"])){
        $isSearched = true;
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
                <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="get" class="col-md-4">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="search">
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
            <div class="col-md-3 px-4 py-4 sticky-top">
                <?php showFilter(); ?>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="get" class="col-md-7 m-0">
                        <div class="input-group">
                            <input type="text" class="form-control m-0" placeholder="Search" name="search">
                            <button class="btn btn-outline-secondary" type="submit">search</button>
                        </div>
                    </form>
                </div>
                <p class="mb-3">Showing 25 results</p>
                <h1>Books</h1>
                <h1>Books</h1>
                <h1>Books</h1>
                <h1>Books</h1>
                <h1>Books</h1>
                <h1>Books</h1>
                <h1>Books</h1>
                <h1>Books</h1>
                <h1>Books</h1>
                <h1>Books</h1>
                <h1>Books</h1>
            
                <div class="row justify-content-center">
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