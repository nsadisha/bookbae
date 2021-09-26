<?php include "php/adminHelper.php" ?>

<?php
session_start();

if(!isAdminSigned()){
    header("Location: login.php");
}

if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
    if($id=="all"){
        $res = execute("DELETE FROM placed_orders");
    }else{
        $res = execute("DELETE FROM placed_orders WHERE order_id=\"$id\"");
    }
}

header("Location: index.php");

?>