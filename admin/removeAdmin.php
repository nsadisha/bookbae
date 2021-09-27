<?php include "php/adminHelper.php" ?>

<?php
session_start();

if(!isAdminSigned()){
    header("Location: login.php");
}

if (isset($_REQUEST["email"])) {
    $removingEmail = $_REQUEST["email"];
    echo "$removingEmail remove";
    $res = execute("DELETE FROM admins WHERE email=\"$removingEmail\"");

    header("Location: index.php");
}

?>