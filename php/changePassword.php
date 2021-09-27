<?php
     $conn=mysqli_connect('localhost','root','','bookbae');

     if(isset($_REQUEST['submit3'])){
 
         session_start();
         $email=$_SESSION['email'];
        
         $currentpass=$_REQUEST['currentPassword'];
         $newpass=$_REQUEST['newPassword'];
         $confirmpass=$_REQUEST['confirmPassword'];
         
         $sql="select password from users where email=\"$email\"";
         $result=$conn->query($sql);
         while ($row = $result->fetch_array()) {
            $currentPassword= $row['password'];
        }
        
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
                echo "Confirm and new deosn't match. <a href='../account.php'>Back</a>";
            }
        }else{
            echo "Incorrect old password. <a href='../account.php'>Back</a>";
        }
     }
?>