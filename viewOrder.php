<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>
<?php include "php/helper.php" ?>

<?php
    if(!isset($_REQUEST["id"])){
        header("location: orders.php");
    }

    //if user is not signed in
    if(!isSigned()){
        header("Location: signin.php");
    }
    //get user email
    $email = getSignedEmail();

    $id = $_REQUEST["id"];
    $order = get("SELECT * FROM orders WHERE order_id=\"$id\" AND email=\"$email\"");

    //order details
    $status = $order["status"];
    $date = explode(" ", $order["date"])[0];
    $time = explode(" ", $order["date"])[1];
    $grandTotal = number_format($order["total_price"], 2);
    // var_dump($order);
    $orderItems = execute("SELECT B.name, B.isbn, B.author, B.price, O.quantity, O.quantity * B.price 'total' FROM order_items O RIGHT OUTER JOIN books B ON O.isbn=B.isbn WHERE O.order_id=\"$id\"");

    function getOrderItemList(){
        global $orderItems;
        foreach ($orderItems as $item) {
            $name=$item["name"];
            $isbn=$item["isbn"];
            $author=$item["author"];
            $price=$item["price"];
            $quantity=$item["quantity"];
            $total=$item["total"];

            $row = "
                <tr class='align-middle'>
                    <td>
                        <div class='d-flex'>
                            <div class=''>
                                <img src='assets/images/view page/1.jpg' alt='image' style='max-width: 4rem;'>
                            </div>
                            <div class='d-grid align-items-center ms-3'>
                                <div>
                                    <a href='view.php?isbn=$isbn' class='no-link'><strong>$name</strong></a><br>
                                    <span><small>By: $author <br>($isbn)</small></span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><strong>$price</strong></td>
                    <td><strong>$quantity</strong></td>
                    <td><strong>$total</strong></td>
                </tr>
            ";
            echo $row;
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
    <title>BookBae | View Order</title>
    <style>
        .no-link{
            text-decoration: none;
            color: black;
        }
        .bottom-section{
            border-radius: 20px;
            background-color: #87574b10;
        }
    </style>
</head>
<body>
    
    <!-- Navbar starts -->
    <?php navbar(""); ?>
    <!-- Navbar ends -->
    
    <!-- Page content starts -->
    <!-- when invalid order id -->
    <div  class="text-center my-5 <?php echo $order?"d-none":""; ?>">
        <h1>Invalid order id...!</h1>
        <a href="orders.php" class="btn bg-brown text-white mt-2"><strong>All orders</strong></a>
    </div>

    <div class="container my-3 <?php echo !$order?"d-none":""; ?>">
        <div class="row">
            <div class="col">
                <h2><?php echo "Order #".$id; ?></h2>
                <div class="hr mb-3"></div>
                <span class="font-SF-Pro text-secondary"><?php echo "On $date at $time"; ?></span><br>
                <span class='badge <?php echo getStatus($status); ?>'><strong><?php echo $status; ?></strong></span>
                <h3 class="text-brown my-2"><?php echo "Rs. $grandTotal"; ?></h3>
            </div>
            <div class="col-auto d-flex align-items-center d-none d-md-block">
                <a href="orders.php" class="btn bg-brown text-white"><i class="bi bi-arrow-left"></i> <strong>All orders</strong></a>
            </div>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-hover overflow-scroll">
                <thead class="text-secondary">
                    <tr>
                    <th scope="col" style="min-width:5rem;">BOOK</th>
                    <th scope="col" style="min-width:5rem;">PRICE</th>
                    <th scope="col" style="min-width:5rem;">QTY</th>
                    <th scope="col" style="min-width:5rem;">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php getOrderItemList(); ?>
                </tbody>
            </table>
        </div>

        <section class="bottom-section my-4 p-4 px-5">
            <div class="row">
                <div class="col-sm-5 mb-4 mb-md-0">
                    <h4>Order notes</h4>
                    <div class="input-group">
                        <textarea class="form-control font-sf-pro text-secondary" rows="3" placeholder="No custon notes" disabled><?php echo $order['note']; ?></textarea>
                    </div>
                </div>
                <div class="col"></div>
                <div class="col-sm-5 col-md-3 d-grid align-items-center">
                    <h3 class="text-brown"><?php echo "Total: Rs. $grandTotal"; ?></h3>
                </div>
            </div>
        </section>
    </div>
    <!-- Page content ends -->

    <!-- Footer starts -->
    <?php footer(); ?>
    <!-- Footer ends -->
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>