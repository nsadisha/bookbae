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

if($quantity==0){
    $quantity=1;
}

if(isset($_REQUEST['buyNow'])){
 
  $_SESSION['qty']=$quantity;
  $_SESSION['isbn']=$isbn;
  $_SESSION['order_type']="buy_now";
  header('Location:../buynow-checkout.php');

}else{
  $_SESSION['order_type']="add_cart";
  $delete = execute("DELETE FROM cart WHERE (email=\"$email\" AND isbn=\"$isbn\")");
  $insert = execute("INSERT INTO cart VALUES(\"$email\", \"$isbn\", \"$quantity\")");
  goBack();
}



?>