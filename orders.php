<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>
<?php include "components/item.php" ?>

<?php
    $orders = execute("SELECT * FROM orders");

    function showOrders(){
        global $orders;
        foreach($orders as $order) {
            $id = $order["order_id"];
            $date = explode(" ", $order["date"])[0];
            $itemCount = execute("SELECT SUM(quantity) 'count' FROM order_items WHERE order_id=\"$id\"")->fetch_assoc()['count'];
            $total = $order["total_price"];
            $note = $order["note"];
            $status = $order["status"];
            
            orderItem($id, $date, $itemCount?$itemCount:0, $total, $note, $status);
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
    <link rel="stylesheet" href="css/orders.css">
    <title>BookBae | Orders</title>
</head>
<body>
    
    <!-- Navbar starts -->
    <?php navbar("orders"); ?>
    <!-- Navbar ends -->
    
    <!-- Page content starts -->
    <div class="container my-3">
        <div class="row">
            <div class="col">
                <h2 class="mb-2">My Orders</h2>
                <div class="hr mb-3 mb-md-4"></div>
            </div>
            <div class="col-auto d-flex align-items-center d-none d-md-block">
                <a href="search.php?q=" class="btn bg-brown text-white"><i class="bi bi-arrow-left"></i> <strong>Continue shopping</strong></a>
            </div>
        </div>
        <h2 class="text-center my-5 <?php echo $orders->num_rows!=0?"d-none":""; ?>">You don't have any orders yet...!</h2>
        <div class="table-responsive <?php echo $orders->num_rows==0?"d-none":""; ?>">
            <table class="table table-hover overflow-scroll">
                <thead class="text-secondary">
                    <tr>
                    <th scope="col" style="min-width:9rem;">ORDER ID</th>
                    <th scope="col" style="min-width:7rem;">DATE</th>
                    <th scope="col" style="min-width:7rem;">NO. OF ITEMS</th>
                    <th scope="col" style="min-width:5rem;">TOTAL</th>
                    <th scope="col" style="min-width:3rem;">NOTES</th>
                    <th scope="col">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php showOrders(); ?>
                    <?php //orderItem("123123", "Date", 5, 385, "note", "Cancelled"); ?>
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