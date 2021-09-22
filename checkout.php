<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>
<?php include "components/item.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
    <link rel="stylesheet" href="css/cart.css">
    <title>BookBae | Checkout</title>
</head>
<body>

    <!-- Navbar starts -->
    <?php navbar(""); ?>
    <!-- Navbar ends -->

    <!-- Page content starts -->
    <div class="container my-3">
        <div class="row">
            <div class="col">
                <h2 class="mb-2">Checkout</h2>
                <div class="hr mb-3 mb-md-4"></div>
            </div>
            <div class="col-auto d-flex align-items-center d-none d-md-block">
                <a href="search.php?q=" class="btn bg-brown text-white"><i class="bi bi-arrow-left"></i> <strong>Continue shopping</strong></a>
            </div>
        </div>
    </div>
    <!-- Page content ends -->

    <!-- Footer starts -->
    <?php footer(); ?>
    <!-- Footer ends -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>