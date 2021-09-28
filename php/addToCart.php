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

$delete = execute("SELECT * FROM cart C WHERE EXISTS (SELECT * FROM cart WHERE email=\"$email\" AND isbn=\"$isbn\")");
$delete = execute("INSERT INTO cart VALUES(\"$email\", \"$isbn\", \"$quantity\")");

closeTab();

?>