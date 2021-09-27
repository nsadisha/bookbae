<?php
    $conn=mysqli_connect('localhost','root','','bookbae');

    if(isset($_REQUEST['submit'])){

        session_start();
        $email=$_SESSION['email'];

        $fname=$_REQUEST['fname'];
        $lname=$_REQUEST['lname'];
        $contact=$_REQUEST['contact'];

        $sql="UPDATE users SET fname=\"$fname\",lname=\"$lname\",contact=\"$contact\" where email=\"$email\"";
        $update=$conn->query($sql);
        
        header("Location: ../account.php");

    }
?>