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
    <link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/signin.css">
    
    <title>BookBae | Sign in</title>
</head>
<body>
    <!-- Page content starts -->
    <div class="form">
        <!-- <div class="tab-content"> -->
        <div id="login">   
            <h1>Admin Login</h1>
            
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="field-wrap">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                
                <div class="field-wrap">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                        
                <button type="submit" class="button button-block" name="submit" value="login">Log In</button>
                <h3 class="text-center text-white mt-3"><?php echo $err; ?></h3>
            </form>

            </div>
        </div>
    </div>
    <div class="text-center">
        <a href="../" class="btn bg-brown text-white"><i class="bi bi-arrow-left"></i><strong>Back to site</strong></a>
    </div>
</body>
</html>