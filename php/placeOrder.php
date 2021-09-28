<?php include "helper.php" ?>

<?php
if(!isSigned()){
    header("Location: signin.php");
}
$email = getSignedEmail();

$id = $_REQUEST["id"];
$total = $_REQUEST["total"];
$note = $_REQUEST["note"];

$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];
$address = $_REQUEST["address"];
$city = $_REQUEST["city"];

$result = execute("INSERT INTO placed_orders (order_id, email, total_price, note) VALUES(\"$id\", \"$email\", \"$total\", \"$note\")");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css?v=<?php echo time(); ?>">
    <title>Order #<?php echo $id; ?></title>
</head>
<body>
    <h2 class="text-center my-5">You will be redirected to payment page shortly!</h2>
<form method="post" action="https://sandbox.payhere.lk/pay/checkout" id="payhereform" style="display: none;">   
    <input type="hidden" name="merchant_id" value="1218675">
    <input type="hidden" name="return_url" value="http://localhost/bookbae/php/orderReturn.php?id=<?php echo $id; ?>">
    <input type="hidden" name="cancel_url" value="http://localhost/bookbae/php/orderCancel.php?id=<?php echo $id; ?>">
    <input type="hidden" name="notify_url" value="http://localhost/bookbae/php/orderNotify.php?id=<?php echo $id; ?>">  
    <br><br>Item Details<br>
    <input type="text" name="order_id" value="<?php echo $id; ?>">
    <input type="text" name="items" value="Order"><br>
    <input type="text" name="currency" value="LKR">
    <input type="text" name="amount" value="<?php echo $total; ?>">  
    <br><br>Customer Details<br>
    <input type="text" name="first_name" value="<?php echo $fname; ?>">
    <input type="text" name="last_name" value="<?php echo $lname; ?>"><br>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <!-- <input type="text" name="phone" value="0771234567"><br> -->
    <input type="text" name="address" value="<?php echo $address; ?>">
    <input type="text" name="city" value="<?php echo $city; ?>">
    <input type="hidden" name="country" value="Sri Lanka"><br><br> 
    <input type="submit" value="Buy Now">   
</form> 
<script>
    var form = document.getElementById("payhereform");
    form.submit();
</script>
</body>
</html>