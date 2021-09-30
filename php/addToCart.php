<?php include 'helper.php' ?>
<?php

//add an item to cart
if(!isSigned() || !isset($_REQUEST["isbn"])){
    header("Location: ../signin.php");
}
//get email
if(isSigned()){
    $email = getSignedEmail();
    $isbn = $_REQUEST["isbn"];
    $quantity = $_REQUEST["quantity"];

if(!$quantity){
    $quantity=1;
}
$availableQuantity = get("SELECT available_quantity FROM books WHERE isbn=\"$isbn\"")["available_quantity"];

if($availableQuantity == 0){
    return;
}else if($availableQuantity < $quantity){
  $quantity=$availableQuantity;
}else{
  // do nothing
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
  header('Location:../cart.php');
    
}

    // $delete = execute("SELECT * FROM cart C WHERE EXISTS (SELECT * FROM cart WHERE email=\"$email\" AND isbn=\"$isbn\")");

}

?>