<?php include "helper.php" ?>

<?php

if(isset($_REQUEST["email"])){
    $email=$_REQUEST["email"];

    $result = execute("INSERT INTO subscribers VALUES(\"$email\")");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookBae | Subscribe</title>
    <link rel="stylesheet" href="../css/styles.css?v=<?php echo time(); ?>">
    <style>
        .content{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -60%);
        }
        .check-icon i{
            font-size: calc(4rem + 5vw);
            color: #00c45c;
        }
    </style>
</head>
<body>

    <div class="content text-center w-100">
        <div class="check-icon">
            <i class="bi bi-check2-circle"></i>
        </div>
        <h2 class="<?php echo $result?"":"d-none" ?>">Thank you!<br>Successfully subscribed to BookBae!</h2>
        <h2 class="<?php echo $result?"d-none":"" ?>">You have already subscribed to BookBae!</h2>
        <a href="../index.php" class="btn bg-brown text-white mt-3"><i class="bi bi-arrow-left"></i><strong>Go back</strong></a>
    </div>
    
</body>
</html>