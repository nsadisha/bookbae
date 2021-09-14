<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>

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
    <link rel="stylesheet" href="css/styles.css">
    <title>BookBae | Home</title>
</head>
<body>

    <!-- Navbar starts -->
    <?php navbar('home'); ?>
    <!-- Navbar ends -->

    <!-- Page content starts -->

    <!-- search bar -->
    <section>Search</section>
    <!-- landing -->
    <section class="<?php echo !$isSearched?"d-block":"d-none" ?>">
        <div class="container-fluid">
            <h4>New arrivals</h4>
        </div>
    </section>
    <!-- search products -->
    <section class="<?php echo $isSearched?"d-block":"d-none" ?>">Searched</section>
    <!-- Page content ends -->

    <!-- Footer starts -->
    <?php footer(); ?>
    <!-- Footer ends -->
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>