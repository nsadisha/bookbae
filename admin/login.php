<?php include "./php/adminHelper.php" ?>

<?php
session_start();

//if is signed navigate to index
if(isAdminSigned()){
    header("Location: ./");
}

$err = "";
if(isset($_REQUEST["submit"])){
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];

    //get password text from db
    $dbPassword = getAdminPassword($email);

    //is email available
    if(!$dbPassword){
        $err = "Email address not found!";
    }else{
        //is correct password
        if(md5($password) == $dbPassword){
            header("Location: ./");
            $_SESSION['adminEmail'] = $email;
        }else{
            $err = "Incorrect password. Try again!";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
    <link rel="stylesheet" href="css/adminStyles.css">
    
    <title>BookBae | Sign in</title>
</head>
<body>
    <section class="container mt-5">
        <h1 class="text-center">Admin Login</h1>
        <div class="row justify-content-center">
            <div class="col-md-4 mt-4">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="mb-2">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    
                    <div class="mb-4">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                            
                    <button type="submit" class="btn w-100 bg-brown text-white" name="submit" value="login"><strong>Log In</strong></button>
                    <h3 class="text-center text-white mt-3"><?php echo $err; ?></h3>
                </form>
            </div>
            <div class="w-100 mt-5"></div>
            <hr class="w-50">
        </div>
    </section>

    <div class="text-center">
        <a href="../" class="btn bg-brown text-white"><i class="bi bi-arrow-left"></i><strong>Back to site</strong></a>
    </div>
</body>
</html>