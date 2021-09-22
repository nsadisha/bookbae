<?php include "components/footer.php" ?>
<?php include "components/navbar.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
    <link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/signin.css">
    
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <title>BookBae | Sign in</title>
    <script src="js/signin.js"></script>

    <script>
        window.console = window.console || function(t) {};
    </script>

    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
    }
    </script>
</head>
<body>

    <!-- Navbar starts -->
    <?php navbar("signin"); ?>
    <!-- Navbar ends -->

    <!-- Page content starts -->
    <div class="form">
        
        
        <div class="tab-content">
        <div id="login">   
            <h1>Welcome Back!</h1>
            
            <form action="/" method="post">
            
                <div class="field-wrap">
                <label>
                Email Address<span class="req">*</span>
                </label>
                <input type="email"required autocomplete="off"/>
            </div>
            
            <div class="field-wrap">
                <label>
                Password<span class="req">*</span>
                </label>
                <input type="password"required autocomplete="off"/>
            </div>
            
            <p class="forgot"><a href="#">Forgot Password?</a></p>
            
            <button class="button button-block"/>Log In</button>
            
            </form>

            </div>
            
            <div>
            </div>
            
        </div><!-- tab-content -->
      
    </div> <!-- /form -->
    <!-- Page content ends -->

    <!-- Footer starts -->
    <?php footer(); ?>
    <!-- Footer ends -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>