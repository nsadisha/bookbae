<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>
<?php include "php/helper.php" ?>

<?php
$email = getSignedEmail();
if(!$email){
    header("Location: signin.php");
}
$user = get("SELECT U.fname, U.lname, A.* FROM users U RIGHT OUTER JOIN user_addresses A ON U.email=A.email WHERE A.email=\"$email\"");
$fname = $user["fname"];
$lname = $user["lname"];
$name = $fname." ".$lname;
$line1 = $user["line1"];
$line2 = $user["line2"];
$city = $user["city"];
$province = $user["province"];
$zip = $user["zip"];

$orderId = generateOrderId();

//taking quantity and isbn

$quantity=$_SESSION['qty'];
$isbn=$_SESSION['isbn'];

$orderItem =execute("select * from books where isbn=$isbn");
$item=$orderItem->fetch_array();
$price=$item["price"];
$subTotal=((int)$quantity*(int)$price);
$deliveryFee = 300;
$grandTotal = $deliveryFee + $subTotal;

//add to order_items table
$updateOrderItems = execute("INSERT into order_items (order_id,isbn,quantity) values(\"$orderId\",\"$isbn\",\"$quantity\")");

function showOrderSummery(){
    global $email, $deliveryFee,$orderItem,$subTotal,$grandTotal,$quantity;
   
    foreach ($orderItem as $item) {
        // var_dump($item);

        $item = "
        <tr style='border-bottom: solid #ccc 1px;'>
            <td class='text-secondary pt-2'><strong>".$item["name"]."</strong><br><small>RS. ".number_format($item["price"], 2)." &times; ".$quantity."</small></td>
            <td class='text-end pt-2'><strong>Rs. ".number_format($subTotal, 2)."</strong></td>
        </tr>
        ";

        // print_r($item["total"]);

        echo $item;
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
    <link rel="stylesheet" href="css/cart.css">
    <title>BookBae | Checkout</title>
    <style>
        .cCart{
            border-radius: 20px;
            margin-bottom: 1rem;
        }
    </style>
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
                <a href="cart.php" class="btn bg-brown text-white"><i class="bi bi-arrow-left"></i> <strong>Back to cart</strong></a>
            </div>
        </div>
        <form action="php/placeOrder.php" method="post">
            <div class="row">
                <div class="col-md-7">
                    <div class="cCart p-3 p-md-5 bg-light">
                        <h3><strong>Order #<?php echo $orderId; ?></strong></h3>
                        <h4 class="text-brown">Rs. <?php echo number_format($grandTotal, 2) ?></h4>
                        <h5 class="mt-3 mb-1"><strong>Address</strong></h5>
                        <p class="text-secondary">
                            <?php echo "$name<br>$line1, $line2,<br>$city,<br>$province.<br>$zip"; ?>
                        </p>

                    </div>
                    <div class="cCart p-3 p-md-5 bg-light">
                        <h4><strong>Order notes</strong></h4>
                        <div class="input-group">
                            <textarea class="form-control font-sf-pro" rows="3" name="note" placeholder="Add custon notes"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="cCart p-3 p-md-5 bg-light">
                        <h5><strong>Order summery</strong></h5>
                        <table class="w-100" style="border-spacing: 0 50px;">
                            <?php showOrderSummery(); ?>
                            <tr>
                                <td class="text-secondary" style="padding-top: 1rem;"><strong>Sub total</strong></td>
                                <td class="text-end" style="padding-top: 1rem;"><strong>Rs. <?php echo number_format($subTotal, 2) ?></strong></td>
                            </tr>
                            <tr>
                                <td class="text-secondary"><strong>Delivery fees</strong></td>
                                <td class="text-end"><strong>Rs. <?php echo number_format($deliveryFee, 2) ?></strong></td>
                            </tr>
                            <tr style="border-top: solid #ccc 1px;">
                                <td style="padding-top: 1rem;"><strong>Grand total</strong></td>
                                <td class="text-end" style="padding-top: 1rem;"><strong>Rs. <?php echo number_format($grandTotal, 2) ?></strong></td>
                            </tr>
                        </table>
                        <input type="hidden" name="fname" value="<?php echo $fname; ?>">
                        <input type="hidden" name="lname" value="<?php echo $lname; ?>">
                        <input type="hidden" name="address" value="<?php echo $line1.", ".$line2; ?>">
                        <input type="hidden" name="city" value="<?php echo $city; ?>">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="id" value="<?php echo $orderId; ?>">
                        <input type="hidden" name="total" value="<?php echo $grandTotal; ?>">
                        <button type="submit" class="btn bg-brown text-white mt-3 w-100 py-2"><strong>Place order</strong> <i class="bi bi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Page content ends -->

    <!-- Footer starts -->
    <?php footer(); ?>
    <!-- Footer ends -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>