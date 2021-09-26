<?php
     $conn=mysqli_connect('localhost','root','','bookbae');

     if(isset($_REQUEST['submit'])){
 
         session_start();
         //$email=$_SESSION['email'];
        $email="tharu.chamalsha@gmail.com";
         $currentpass=$_REQUEST['currentPassword'];
         $newpass=$_REQUEST['newPassword'];
         $confirmpass=$_REQUEST['confirmPassword'];
         echo $email;
         $sql="select password from users where email=\"$email\"";
         $result=$conn->query($sql);
         while ($row = $result->fetch_array()) {
            $currentPassword= $row['password'];
        }
        echo $currentPassword;
        if($currentpass==$currentPassword){
            if($newpass==$confirmpass){
                $sql2="UPDATE users SET password=\"$newpass\" where email=\"$email\"";
                $result=$conn->query($sql2);
                if($result){
                    echo "success";
                }else{
                    echo "not success";
                }
            }else{
                echo "confirm and new deosn't match";
            }
        }else{
            echo "old and new not matching";
        }
     }
?>