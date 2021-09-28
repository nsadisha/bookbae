<?php include "./php/adminHelper.php" ?>
<?php include "../sendmail/sendMail.php" ?>

<?php
session_start();

if(!isAdminSigned()){
    header("Location: login.php");
}
$email = getSignedAdminEmail();

// complete order
if(isset($_REQUEST["send"])){
    $subscribers = execute("SELECT * FROM subscribers");
    $subject = $_REQUEST["subject"];
    $body = $_REQUEST["body"];

    //get email list
    $subs = array();
    foreach($subscribers as $subscriber){
        $subscriberEmail = $subscriber["email"];
        array_push($subs, $subscriberEmail);
    }
    //sending the mail
    sendMailToAGroup($subs, $subject, $body);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminStyles.css">
    <title>Send mails</title>
</head>
<body>
    <!-- Nav bar -->
    <nav class='navbar navbar-expand-md navbar-light bg-none'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='./'><img src='../assets/images/logo.png' alt='logo' width='130'></a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
                <li class='nav-item'><a class='nav-link' href='./'>
                    <span>Dashboard</span>
                </a></li>
                <li class='nav-item'><a class='nav-link' href='../'>
                    <span>BookBae</span>
                </a></li>
                <li class='nav-item'><a class='nav-link active' href='sendMails.php'>
                    <span>Email to subscribers</span>
                </a></li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                        More
                    </a>
                    <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdown'>
                        <li><a class='dropdown-item' href='orders.php'>All orders</a></li>
                        <li><a class='dropdown-item' href='edit.php'>Edit book</a></li>
                        <li><hr class='dropdown-divider'></li>
                        <li><a class='dropdown-item text-danger' href='php/signout.php'>Sign out</a></li>
                    </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <section class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h2><strong>Send mails to subscribers</strong></h2>
                <div class="hr mb-3"></div>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
                    <div class="col-12 mt-2">
                        <input type="text" class="form-control font-sf-pro" name="subject" placeholder="Email subject" required>
                    </div>
                    <div class="col-12 mt-2">
                        <textarea class="form-control font-sf-pro" rows="15" name="body" placeholder="Email body"></textarea>
                    </div>
                    <div class="col-12 d-flex mt-3">
                        <button type="submit" class="btn bg-brown text-white ms-auto" name="send"><strong>Send mail</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>