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
    <link rel="stylesheet" href="css/orders.css">
    <title>BookBae | Orders</title>
</head>
<body>
    
    <!-- Navbar starts -->
    <?php navbar("orders"); ?>
    <!-- Navbar ends -->
    
    <!-- Page content starts -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-2">Orders</h1>
                <div class="hr mb-3 mb-md-4"></div>
            </div>
            <div class="col-auto d-flex align-items-center d-none d-md-block">
                <a href="search.php?q=" class="btn bg-brown text-white"><i class="bi bi-arrow-left"></i> <strong>Continue shopping</strong></a>
            </div>
        </div>
        <h2 class="text-center my-5 d-none">You dont have any orders yet...!</h2>
        <div class="table-responsive">
            <table class="table table-hover overflow-scroll">
                <thead class="text-secondary">
                    <tr>
                    <th scope="col">ORDER ID</th>
                    <th scope="col">DATE</th>
                    <th scope="col">NO. OF ITEMS</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="order-item">
                        <td><a href="#"><strong>#<?php echo generateOrderId(); ?></strong></a></td>
                        <td><strong>2021/09/21</strong></td>
                        <td><strong>5</strong></td>
                        <td><strong>RS. 150.00</strong></td>
                        <td><span class="badge bg-success"><strong>Delivered</strong></span></td>
                    </tr>
                    <tr class="order-item">
                        <td><a href="#"><strong>#<?php echo generateOrderId(); ?></strong></a></td>
                        <td><strong>2021/09/21</strong></td>
                        <td><strong>5</strong></td>
                        <td><strong>RS. 150.00</strong></td>
                        <td><span class="badge bg-warning"><strong>Shipped</strong></span></td>
                    </tr>
                    <tr class="order-item">
                        <td><a href="#"><strong>#<?php echo generateOrderId(); ?></strong></a></td>
                        <td><strong>2021/09/21</strong></td>
                        <td><strong>5</strong></td>
                        <td><strong>RS. 150.00</strong></td>
                        <td><span class="badge bg-info"><strong>Processing</strong></span></td>
                    </tr>
                    <tr class="order-item">
                        <td><a href="#"><strong>#<?php echo generateOrderId(); ?></strong></a></td>
                        <td><strong>2021/09/21</strong></td>
                        <td><strong>5</strong></td>
                        <td><strong>RS. 150.00</strong></td>
                        <td><span class="badge bg-danger"><strong>Cancelled</strong></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Page content ends -->

    <!-- Footer starts -->
    <?php footer(); ?>
    <!-- Footer ends -->
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>