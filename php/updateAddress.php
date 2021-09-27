<?php
 $conn=mysqli_connect('localhost','root','','bookbae');

 if(isset($_REQUEST['submit2'])){

     session_start();
     $email=$_SESSION['email'];

     $line1=$_REQUEST['line1'];
     $line2=$_REQUEST['line2'];
     $state=$_REQUEST['state'];
     $city=$_REQUEST['city'];
     $zip=$_REQUEST['zip'];

     $sql="UPDATE user_addresses SET line1=\"$line1\",line2=\"$line2\",province=\"$state\",city=\"$city\",zip=\"$zip\" where email=\"$email\"";
     $update=$conn->query($sql);
     if($update){
         header('Location:../account.php');
     }else{
         echo "Something went wrong!";
     }


 }
?>
