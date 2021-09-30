<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>
<?php include "php/helper.php" ?>
<?php include "sendmail/sendMail.php" ?>

<?php

if(!isset($_REQUEST["email"])){
    header("Location: register.php");
}
$email = $_REQUEST["email"];
$verificationCode = get("SELECT code FROM user_verification_codes WHERE email=\"$email\"")["code"];

if(!$verificationCode){
    echo "<h5 class='text-center'>Please fill the <a href='register.php'>register form</a> first.</h5>";
}

if(isset($_REQUEST["verify"])){
    $code = $_REQUEST["code"];
    if(md5($code) == $verificationCode){
        $result = execute("DELETE FROM user_verification_codes WHERE email=\"$email\"");
        echo "<script>alert('Successfully verified!');</script>";
        header("Location: signin.php");
    }else{
        echo "<script>alert('Incorrect pin. Try again!');</script>";
    }
}

if(isset($_REQUEST["resend"])){
    //generating a new code
    $code = rand(100000,999999);
    //email content
    $subject = "Verification code";
    $body = "<h1>BookBae</h1><p>Your verification code is: <strong>$code</strong></p>";
    $code = md5($code);
    //update the database with the new code
    $result = execute("UPDATE user_verification_codes SET code=\"$code\" WHERE email=\"$email\"");
    if($result){
        //sending email
        sendMail($email, $subject, $body);
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
   
    <link rel="stylesheet" href="css/verify.css">

    <!-- bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- swiper css -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <!--google fonts -->
    
    
    <title>BookBae | Verify</title>
</head>
<body>
    <div class="container p-5 content">
        <div class="row my-5">
            
            
            <div class="col-md-6 justify-content-center input-pin">
                <div class="col-md-12 d-flex justify-content-center mail">
                    <img src="assets\images\profile\undraw_Mail_sent_re_0ofv-removebg-preview (1).png" style="width:40%;" class="d-flex justify-content-cente"><br>
                </div>
                <p>Before creating account, we need toverify your email ID <strong><?php echo "$email"; ?></strong><p> 
                <p>We have sent you a verification code to your email address.</p>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="col-md-12 d-flex justify-content-center">
                        <input type="text" id="code" name="code" style="width: 30%;" required>
                        <input type="hidden" name="email" value="<?php echo $email; ?>" required>
                    </div>
                    <p>Didn't get the pin. <a href="verify.php?resend&email=<?php echo $email; ?>">Resend pin</a></p>
                    <div class="col-md-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary " name="verify">Click to verify</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 image">
                <div class="col-md-12 d-flex justify-content-center ">
                    <img src="assets\images\profile\undraw_verified_re_4io7.png" style="width:80%">
                </div>
               
            </div>
            
        </div>
    </div>

</body>
</html>