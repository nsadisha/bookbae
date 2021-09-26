<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
   
    <link rel="stylesheet" href="css/register.css">

    <!-- bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- swiper css -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <!--google fonts -->
    
    <title>BookBae | Register</title>
</head>
<?php
    if(isset($_REQUEST['submit'])){
        $conn=mysqli_connect('localhost','root','','bookbae');
        $fname=$_REQUEST['fname'];
        $lname=$_REQUEST['lname'];
        $email=$_REQUEST['email'];
        $contact=$_REQUEST['contact'];
        $password=$_REQUEST['password'];
        $confirmPassword=$_REQUEST['conpassword'];
        $address=$_REQUEST['address'];
        $state=$_REQUEST['state'];
        $city=$_REQUEST['city'];
        $zipcode=$_REQUEST['zipcode'];
        $sql="INSERT into users values(\"$email\",\"$fname\",\"$lname\",\"$password\",\"$contact\")";
        $location="INSERT INTO user_addresses values(\"$email\",\"$address\",\"$address\",\"$state\",\"$city\",\"$zipcode\")";
        
        $result=$conn->query($sql);
        if($password==$confirmPassword){
            if($result)
            {
                $result2=$conn->query($location);
                header("Location:signin.php");
                
            }else{
                echo "<p class='text-center' style='color:red;'>This email is already registered!!</p>";
            }
        }else{
            echo "<p class='text-center' style='color:red;'>Passwords you entered are not same!!</p>";
        }
        
    }

?>
<body>
    <div class="container pt-5 content">
        <div class="row my-5 jutify-content-center">
            
            <div class="col-md-6  input-data">
                <form name="registerForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <div class="col-md-12 d-flex justify-content-center main-pic">
                        <img src="assets\images\profile.png" style="width:40%;" class="d-flex justify-content-cente"><br>
                    </div>
                    <div class="row pt-4 p-2">
                        <div class="col-4 ">
                            <p><strong>First Name</strong><p> 
                        </div>
                        <div class="col-1"></div>
                        <div class="col-6">
                            <input type="text" placeholder="Type your first name" name='fname'>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-4">
                            <p><strong>Last Name</strong><p> 
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4 ">
                            <input type="text" placeholder="Type your last name" name='lname'>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-4">
                            <p><strong>Email address</strong><p> 
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4">
                            <input type="email" placeholder="Type your email" name='email'>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-4">
                            <p><strong>Contact details</strong><p> 
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4">
                            <input type="text" placeholder="Contact number" name='contact'>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-4">
                            <p><strong>Address line</strong><p> 
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4">
                            <input type="text" placeholder="Address line 1" name="address">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-4">
                            <p><strong>State / Province</strong><p> 
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4">
                            <input type="text" placeholder="Type your state" name="state">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-4">
                            <p><strong>City</strong><p> 
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4">
                            <input type="text" placeholder="Enter Your city" name="city">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-4">
                            <p><strong>Zip code</strong><p> 
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4">
                            <input type="text" placeholder="Enter your zip code" name="zipcode">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-4">
                            <p><strong>Password</strong><p> 
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4">
                            <input type="password"  name='password' placeholder="Password">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-4">
                            <p><strong>Confirm Password</strong><p> 
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4">
                            <input type="password" placeholder="Confirm password" name="conpassword">
                        </div>
                    </div>
                    
                    <div class="col-md-12 d-flex justify-content-center ">
                        <button type="submit" class="btn btn-primary " name="submit" >Register</button>
                    </div>
                </form>
            </div>
            
            <!--second picture-->
            <div class="col-md-6 image">
                <div class="col-md-12 d-flex justify-content-end ">
                    <img src="assets\images\register\undraw_Access_account_re_8spm.png" style="width:80%">
                </div>
               
            </div>

        </div>
    </div>

</body>
</html>

