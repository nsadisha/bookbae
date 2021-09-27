
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
   
    <link rel="stylesheet" href="css/signin.css">

    <!-- bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- swiper css -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <!--google fonts -->
    
    <title>BookBae | Signin</title>
</head>
<body>
    <div class="container pt-5 content">
        <div class="row my-5 justify-content-center">
            
            <div class="col-md-6  input-data " >
                <form name="registerForm" action="<?php echo $_SERVER['PHP_SELF']?>"  method="post">
                    <div class="col-md-12 d-flex justify-content-center main-pic">
                        <img src="assets\images\profile.png" style="width:40%;" class="d-flex justify-content-cente"><br>
                    </div>
                    <h3 class="pt-5">Welcome to Bookbae!</h3>
                    <div class="row pt-4 p-2">
                        <div class="col-4 ">
                            <p><strong>Email</strong><p> 
                        </div>
                        <div class="col-1"></div>
                        <div class="col-6">
                            <input type="email" placeholder="Type your Email address" name='email' required>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-4">
                            <p><strong>Password</strong><p> 
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4 ">
                            <input type="password" placeholder="Type your password" name='password' required>
                        </div>
                    </div>
                    
                    <div class="col-md-12 d-flex justify-content-center ">
                        <button type="submit" class="btn btn-primary " name="submit" >Signin</button>
                    </div>
                </form>
            </div>
            
            <!--second picture-->
            <!-- <div class="col-md-6 image">
                <div class="col-md-12 d-flex justify-content-end ">
                    <img src="assets\images\register\undraw_Welcome_re_h3d9.png" style="width:80%">
                </div>
               
            </div> -->
            
        </div>
    </div>
    <?php
    if(isset($_REQUEST['submit'])){
        $conn=mysqli_connect('localhost','root','','bookbae');
        $email=$_REQUEST['email'];
        $password=$_REQUEST['password'];
        $passwordCompare="select password from users where email=\"$email\"";
        $result=$conn->query($passwordCompare);
        while ($row = $result->fetch_array()) {
            $savedPassword= $row['password'];
        }
        if($password==$savedPassword){
            session_start();
            $_SESSION['email']=$email;
            header('Location: index.php');
        }
        else{
            echo "<p class='text-center' style='color:red;'>one of the elements you entered is incorrect!!<p>";
        }


    }
        
    ?>
</body>
</html>