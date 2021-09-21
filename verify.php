<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>

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
        <div class="row">
            <div class="col-md-6">
                <img src="assets\images\profile\undraw_verified_re_4io7.png" style="width:80%">
            </div>
            <div class="col-md-6 justify-content-center">
                <div class="col-md-12 d-flex justify-content-center">
                    <img src="assets\images\profile\undraw_Mail_sent_re_0ofv.png" style="width:40%;" class="d-flex justify-content-cente"><br>
                </div>
                <p>Before creating account, we need toverify your email ID <strong>example@gmail.com</strong><p> 
                <p>We have sent you a verification code to your email address.</p>
                <div class="col-md-12 d-flex justify-content-center">
                    <input type="text" id="pin" name="pin" style="width: 30%;">
                </div>
                <p>Didn't get the pin. <a href="">Resend pin</a></p>
                <div class="col-md-12 d-flex justify-content-center">
                <button type="button" class="btn btn-primary " >Click to verify</button>
                </div>
                
            </div>
        </div>
    </div>

</body>
</html>