<?php include 'helper.php' ?>

<?php
    if(!isset($_REQUEST["submit"]) || !isSigned()){
        goBack();
    }

    $email = getSignedEmail();

    $submitMethod = $_REQUEST["submit"];
    $isbn = $_REQUEST["isbn"];

    if($submitMethod == "update"){
        //code to update the quantity of a book in cart
        $quantity = $_REQUEST["quantity"];
        $availableQuantity = get("SELECT available_quantity FROM books WHERE isbn=\"$isbn\"")["available_quantity"];
        if($availableQuantity == 0){
            // do nothing
        }else if($availableQuantity < $quantity){
            // $query = execute("INSERT INTO cart VALUES(\"$email\", \"$isbn\", \"$availableQuantity\")");
            $result = execute("UPDATE cart SET quantity=\"$availableQuantity\" WHERE email=\"$email\" AND isbn=\"$isbn\"");
        }else{
            // $query = execute("INSERT INTO cart VALUES(\"$email\", \"$isbn\", \"$quantity\")");
            $result = execute("UPDATE cart SET quantity=\"$quantity\" WHERE email=\"$email\" AND isbn=\"$isbn\"");
        }
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