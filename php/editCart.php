<?php include 'helper.php' ?>

<?php
    if(!isset($_REQUEST["submit"])){
        goBack();
    }

    $email = "example@example.com";

    $submitMethod = $_REQUEST["submit"];
    $isbn = $_REQUEST["isbn"];

    if($submitMethod == "update"){
        //code to update the quantity of a book in cart
        $quantity = $_REQUEST["quantity"];
        $result = execute("UPDATE cart SET quantity=\"$quantity\" WHERE email=\"$email\" AND isbn=\"$isbn\"");
        //go back to cart
        header("Location: ../cart.php");
    }
    
    if($submitMethod =="remove"){
        //code to remove a book from the cart
        $result = execute("DELETE FROM cart WHERE email=\"$email\" AND isbn=\"$isbn\"");
        //go back to cart
        header("Location: ../cart.php");

    }
?>