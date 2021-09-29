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
    echo $isbn;
    $isAvailable = execute("SELECT * FROM favourite_books WHERE  email=\"$email\" AND isbn=\"$isbn\"");
    
    
    if($isAvailable->num_rows != 0){
        header("Location:../favourite.php");
    }else{
        $insert = execute("INSERT INTO favourite_books VALUES(\"$email\", \"$isbn\")");
        header("Location:../favourite.php");
    }
}
?>

