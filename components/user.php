<?php

$conn=mysqli_connect('localhost','root','','bookbae');
if(isset($_REQUEST['submit'])){
    $fname=$_REQUEST['fname'];
    $lname=$_REQUEST['lname'];
    $email=$_REQUEST['email'];
    $contact=$_REQUEST['contact'];
    $password=$_REQUEST['password'];


}



?>