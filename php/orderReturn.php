<?php include "helper.php" ?>

<?php

if(isset($_REQUEST["id"])){
    //order id
    $id = $_REQUEST["id"];
    //email
    $email = getSignedEmail();

    //get order details
    $placedOrder = get("SELECT * FROM placed_orders WHERE order_id=\"$id\"");
    $orderDate = $placedOrder["date"];
    $totalPrice = $placedOrder["total_price"];
    $note = $placedOrder["note"];
    //add to orders
    $addToOrders = execute("INSERT INTO orders VALUES(\"$id\", \"$email\", \"$orderDate\", \"$totalPrice\",  \"$note\", \"Processing\")");
    //remove placed order from plced_orders
    $removeFromPlacedOrders = execute("DELETE FROM placed_orders WHERE order_id=\"$id\"");

    //checking buy now or from cart
    if($_SESSION['order_type']=="buy_now"){
        $itemQuantity=$_SESSION['qty'];
        $itemIsbn=$_SESSION['isbn'];
        //add items to order items
        $addToOrderItems = execute("INSERT INTO order_items VALUES(\"$id\", \"$itemIsbn\", \"$itemQuantity\")");
        //update inventory
        //get quantity
        $getItemQty = get("SELECT available_quantity FROM books WHERE isbn=\"$itemIsbn\"")["available_quantity"];

        //updating quantity
        $newQuantity = $getItemQty-$itemQuantity;
        $update = execute("UPDATE books SET available_quantity=\"$newQuantity\" WHERE isbn=\"$itemIsbn\"");

        //remove items from cart
        $removeFromCart = execute("DELETE FROM cart WHERE email=\"$email\" AND isbn=\"$itemIsbn\"");

        $_SESSION['order_type']="cart";
    }
    else{
        
        //get order items
        $orderItems = execute("SELECT isbn, quantity FROM cart WHERE email=\"$email\"");

        foreach($orderItems as $item){
            $itemIsbn = $item["isbn"];
            $itemQuantity = $item["quantity"];
            //add items to order items
            $addToOrderItems = execute("INSERT INTO order_items VALUES(\"$id\", \"$itemIsbn\", \"$itemQuantity\")");
        
            //remove items from cart
            $removeFromCart = execute("DELETE FROM cart WHERE email=\"$email\" AND isbn=\"$itemIsbn\"");
        
            //update inventory
            //get quantity
            $getItemQty = get("SELECT available_quantity FROM books WHERE isbn=\"$itemIsbn\"")["available_quantity"];

            //updating quantity
            $newQuantity = $getItemQty-$itemQuantity;
            $update = execute("UPDATE books SET available_quantity=\"$newQuantity\" WHERE isbn=\"$itemIsbn\"");
        }
    }
}
// var_dump($_POST);
// $merchant_id = $_POST['merchant_id'];
// $order_id = $_POST['order_id'];
// $payhere_amount = $_POST['payhere_amount'];
// $payhere_currency = $_POST['payhere_currency'];
// $status_code = $_POST['status_code'];
// $md5sig = $_POST['md5sig'];

// $merchant_secret = '48WbV9XonzF4DxJx2Z1uHI8gdta71LJ3a4Pb0I7cNPEe';

// $local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

// if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
//         //TODO: Update your database as payment success
//         echo "payment successfull";
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css?v=<?php echo time(); ?>">
    <style>
        .content{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -60%);
        }
        .check-icon i{
            font-size: calc(4rem + 5vw);
            color: #00c45c;
        }
    </style>
    <title>Payment successful</title>
</head>
<body>
    <div class="content text-center w-100">
        <div class="check-icon">
            <i class="bi bi-check2-circle"></i>
        </div>
        <h2>Payment Successfull!</h2>
        <a href="../index.php" class="btn bg-brown text-white mt-3"><i class="bi bi-arrow-left"></i><strong>Go back</strong></a>
    </div>
</body>
</html>