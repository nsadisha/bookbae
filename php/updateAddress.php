<?php
 $conn=mysqli_connect('localhost','root','','bookbae');

 if(isset($_REQUEST['submit'])){

     session_start();
     $email=$_SESSION['email'];

     $line1=$_REQUEST['line1'];
     $lname=$_REQUEST['line2'];
     $state=$_REQUEST['state'];
     $city=$_REQUEST['city'];
     $zip=$_REQUEST['zip'];

     $sql="UPDATE user_addresses SET line1=\"$line1\",line2=\"$line2\",province=\"$state\",city=\"$city\",zip=\"$zip\" where email=\"$email\"";
     $update=$conn->query($sql);
     if($update){
         echo "done";
     }else{
         echo "no";
     }


 }
?>
