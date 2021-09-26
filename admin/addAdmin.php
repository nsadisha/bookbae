<?php include "php/adminHelper.php" ?>

<?php
session_start();

if(!isAdminSigned()){
    header("Location: login.php");
}

if (isset($_REQUEST["submit"]) && isSuperAdmin(getSignedAdminEmail())) {
    $fname = $_REQUEST["fname"];
    $lname = $_REQUEST["lname"];
    $email = $_REQUEST["email"];
    $password = md5($_REQUEST["password"]);
    $type = $_REQUEST["type"];
    $res = execute("INSERT INTO admins VALUES(\"$email\", \"$fname\", \"$lname\", \"$password\", \"$type\")");

}
header("Location: index.php");

?>