<?php include 'helper.php' ?>

<?php
    if(!isset($_REQUEST["submit"])){
        goBack();
    }

    $submitMethod = $_REQUEST["submit"];
    $isbn = $_REQUEST["isbn"];

    if($submitMethod == "update"){
        //code to update the quantity of a book in cart
        $quantity = $_REQUEST["quantity"];
        echo "$isbn update";
    }

    if($submitMethod =="remove"){
        //code to remove a book from the cart
        echo "$isbn removed";
    }
?>