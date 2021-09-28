<?php include 'helper.php' ?>

<?php

//add an item to cart
if(!isSigned() || !isset($_REQUEST["favSubmit"])){
    goBack();
}
//get email
$email = "example@example.com";
$isbn = $_REQUEST["isbn"];


$delete = execute("SELECT * FROM favourite_books WHERE EXISTS (SELECT * FROM cart WHERE email=\"$email\" AND isbn=\"$isbn\")");
$insert = execute("INSERT INTO favourite_books VALUES(\"$email\", \"$isbn\"");

header("Location:../favourite.php");

?>