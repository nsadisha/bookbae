<?php

$conn=mysqli_connect('localhost','root','','bookbae');

if(isset($_REQUEST['submit'])){
    $fname=$_REQUEST['fname'];
    $lname=$_REQUEST['lname'];
    $email=$_REQUEST['email'];
    $contact=$_REQUEST['contact'];
    $password=$_REQUEST['password'];

    $sql="Insert into users values(\"$email\",\"$fname\",\"$lname\",\"$contact\")";

    $result=$conn->query($sql);
    if($result)
    {
        echo 'success';
    }else{
        echo "error";
    }

}



?>