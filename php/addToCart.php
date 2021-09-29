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

    $availableQuantity = get("SELECT available_quantity FROM books WHERE isbn=\"$isbn\"")["available_quantity"];
    if($availableQuantity == 0){
        // do nothing
    }else if($availableQuantity < $quantity){
        $query = execute("INSERT INTO cart VALUES(\"$email\", \"$isbn\", \"$availableQuantity\")");
    }else{
        $query = execute("INSERT INTO cart VALUES(\"$email\", \"$isbn\", \"$quantity\")");
    }

    // $delete = execute("SELECT * FROM cart C WHERE EXISTS (SELECT * FROM cart WHERE email=\"$email\" AND isbn=\"$isbn\")");

    closeTab();
}

?>