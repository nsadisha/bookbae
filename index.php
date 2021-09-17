<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>
<?php include "components/book.php" ?>
<?php include "components/filter.php" ?>

<?php
    $isSearched = false;
    $q = "";
    $search = "";
    $totalResults = 0;


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

    function showBooks(){
        global $totalResults;
        $books = getAllBooks();
        if($books){
            $totalResults = $books->num_rows;
            foreach($books as $book){
                book($book["isbn"]);
            }
        }else{
            echo "<h1 class='text-center my-5'>No result found!</h1>";
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

    <div class="modal fade" id="filterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php showFilter(); ?>
            </div>
        </div>
    </div>

    <!-- Page content starts -->

    <!-- search bar -->
    <section class="mt-2 <?php echo !$isSearched?"d-block":"d-none" ?>">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="get" class="col-sm-7 col-md-4">
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
                    <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="get" class="col-md-6 m-0">
                        <div class="input-group">
                            <input type="text" class="form-control m-0" placeholder="Search" name="q" value="<?php echo $q; ?>">
                            <button class="btn btn-outline-secondary" type="submit">search</button>
                        </div>
                    </form>
                    <div class="col-auto d-flex align-items-center"><a href="index.php" class="clear-search px-2">&times; Clear search</a></div>
                    <div class="col-auto d-block d-md-none ms-auto py-2"><button class="btn filter-icon-btn" data-bs-toggle="modal" data-bs-target="#filterModal"><i class="bi bi-funnel-fill"></i></button></div>
                </div>
                <p class="mb-3">Showing <?php echo $totalResults; ?> results</p>
                <div class="row g-2">
                    <?php showBooks();?>
                </div>
            
                <!-- Pagination -->
                <div class="row justify-content-center mt-3">
                    <div class="col-auto">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">&lt; Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next &gt;</a>
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