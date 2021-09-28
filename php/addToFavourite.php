<?php include 'helper.php' ?>

<?php

//add an item to cart
if(!isSigned() || !isset($_GET["favSubmit"])){
    goBack();
}
//get email
if(isset($_GET["favSubmit"])){
    $email = getSignedEmail();
    $isbn = $_GET["isbn"];
    
    echo $email;
    $delete = execute("DELETE FROM favourite_books WHERE  email=\"$email\" AND isbn=\"$isbn\"");
    $insert = execute("INSERT INTO favourite_books VALUES(\"$email\", \"$isbn\"");
    if($delete){
        echo "ok";
    }else{
        echo "no";
    }
    if($insert){
        echo "ok";
    }else{
        echo "no";
    }
    //header("Location:../favourite.php");
}
?>

