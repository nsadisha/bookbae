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
<body>
    <div class="container pt-5 content">
        <div class="row my-5">
            
            <div class="col-md-6  input-data">
                <form name="registerForm" action="components/user.php" method="post">
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
                            <input type="password" placeholder="Confirm password" >
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

