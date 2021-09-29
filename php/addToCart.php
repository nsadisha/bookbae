<?php include 'helper.php' ?>
<?php

//add an item to cart
if(!isSigned() || !isset($_REQUEST["isbn"])){
    goBack();
}
//get email
$email = getSignedEmail();
$isbn = $_REQUEST["isbn"];
$quantity = $_REQUEST["quantity"];

if(!isset($quantity)){
    $quantity=1;
}
$delete = execute("DELETE FROM cart WHERE (email=\"$email\" AND isbn=\"$isbn\")");
$insert = execute("INSERT INTO cart VALUES(\"$email\", \"$isbn\", \"$quantity\")");
  header("Location:../cart.php");
?>